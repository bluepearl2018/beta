<?php

namespace Modules\Profile\Http\Controllers;

use Modules\Profile\Http\Requests\FileUserRequest;
use Modules\Profile\Repositories\FileUserRepository;
use Modules\Profile\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Profile\Entities\FileUser as FileUser;
use Response;
use \App\User;
use Flash;
use Auth;
use Crypt;
use Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use DB;

use Modules\Profile\Http\Requests\FileUserRequest as StoreRequest;

// !!!!!!!!!!!! uses FILEUSER :: class /////////

class UserFileController extends Controller
{
    /** @var  FileUserRepository */
    private $fileUserRepository;

    /** @var  UserRepository */
    private $userRepository;

    public function __construct(FileUserRepository $userFileRepo, UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
        $this->fileUserRepository = $userFileRepo;
    }

    /**
     * Display a listing of the UserFile.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $currentUser = Auth::User()->id;
        // dd($currentUser);
        $userFiles = $this->fileUserRepository->getFilesForCurrentUser($currentUser);
        // dd($userFiles);
        return view('profile::userFiles.index')->with($userFiles);
    }

    /**
     * Show the form for creating a new UserFile.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $currentUser = Auth::User()->id;
        $maxFileForUser = $this->userRepository->maxFileForUser($currentUser);
        $userFiles = $this->fileUserRepository->getFilesForCurrentUser($currentUser);
        $currentUserFileCount = $userFiles['countFiles'];
        $remainingFiles = $maxFileForUser-$currentUserFileCount;
        if($currentUserFileCount == $maxFileForUser){
            Flash::error(trans('users.maxFilesReached'));
        }
        elseif($currentUserFileCount < $maxFileForUser){
            Flash::success(trans('users.remainingFiles'.'&nbsp;:'. $remainingFiles));
        }
        return view('profile::userFiles.create');

    }

    /**
     * Store a newly created UserFile in database.
     *
     * @param CreateUserFileRequest $request
     *
     * @return Response
     */
    public function store(StoreRequest $request)
    {
        
        // Get the file from the request
        $file = $request->file('upload_file');
        $fileSize = $file->getSize();
        $fileMimeType = $file->getMimeType();
        $originalFileName = time().'-'.$request->file('upload_file')->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        $dirname = pathinfo($file, PATHINFO_DIRNAME);
        $basename = pathinfo($file, PATHINFO_BASENAME);
        
        // Get the contents of the file
        $contents = $file->openFile()->fread($file->getSize());
        
        // Store the contents to the database
        $userFile = \Modules\Profile\Entities\FileUser::insert(
                [
                    'file_extension' => $extension, 
                    'file_size' => $fileSize, 
                    'file_mime' => $fileMimeType, 
                    'file_content' => file_get_contents($file), 
                    'file_type_id' => 2, 
                    'file_name' => $originalFileName, 
                    'user_id' => Auth::User()->id, 
                    'visibility_id' => 1, 
                    'status_id' => 1 
                ]
            );
        Flash::success(trans('users.fileAdded'));
        return redirect('/profile/users-files');
    }

    public function toggleVisibility(Request $request)
    {
        $serviceId = Crypt::decrypt($request['file_id']);
        $row2update = \Modules\Profile\Entities\FileUser::find($serviceId);
        if($row2update['user_id'] == \Auth::User()->id){
            if (empty($row2update)) {
                Flash::error(trans('users.userFileNotFound'));
                return redirect()->back();
            }
            elseif(!empty($row2update) && $row2update['visibility_id'] == '0'){
                $row2update->visibility_id = '1';
                $row2update->save();
                Flash::success(trans('users.itemNowVisible'));
                return redirect('/profile');
            }
            elseif(!empty($row2update) && $row2update['visibility_id'] == '1'){
                $row2update->visibility_id = '0';
                $row2update->save();
                Flash::warning(trans('users.itemNowInvisible'));
                return redirect('/profile');
            }
            return redirect('/profile');
        }
        Flash::error(trans('interface.aProblemOccurred'));
    }

    public function toggleStatus(Request $request)
    {
        $serviceId = Crypt::decrypt($request['file_id']);
        $row2update = \Modules\Profile\Entities\FileUser::find($serviceId);
        if($row2update['user_id'] == \Auth::User()->id){
            if (empty($row2update)) {
                Flash::error(trans('users.userFileNotFound'));
                return redirect()->back();
            }
            elseif(!empty($row2update) && $row2update['status_id'] == '0'){
                $row2update->status_id = '1';
                $row2update->save();
                Flash::success(trans('action.itemNowVisible'));;
                return redirect('/profile');
            }
            elseif(!empty($row2update) && $row2update['status_id'] == '1'){
                $row2update->status_id = '0';
                $row2update->save();
                Flash:warning(trans('action.itemNowInvisible'));;
                return redirect('/profile');
            }
            return redirect('/profile');
        }
        Flash::error(trans('interface.aProblemOccurred'));
    }
    public function downloadUserFile(?User $user, Request $request)
    {
        $file = FileUser::where('id', Crypt::decrypt($request->userFileToDownload))
        ->firstOrFail(); 

        $fileContent = $file->file_content; // the generated file content
        $response = Response::make($fileContent, 200, [
            'Content-Type' => $file->file_path,
            'Content-Disposition' => 'attachment; filename='.$file->file_name.'',
        ]);
        Flash::warning(trans('action.scanWithAntivirus'));
        return $response;
        redirect()->back();
    }


    /**
     * Remove the specified UserFile from database.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userFile = FileUser::find($id);
        if(Auth::Check()){
            if (empty($userFile) && Auth::User()->id == $userFile->user_id){
                Flash::error(trans('users.userFileNotFound'));
                return redirect(route('users-files.index'));
            }
            elseif(!empty($userFile) && $userFile->status_id == 1 && Auth::User()->id == $userFile->user_id){
                Flash::error(trans('action.desactivateFirst'));
                return redirect(route('users-files.index'));
            }
            elseif(!empty($userFile) && $userFile->status_id == 0 && Auth::User()->id == $userFile->user_id){
                FileUser::destroy($id);
                Flash::success(trans('users.userFileDeleted'));
                return redirect(route('users-files.index'));
            }
            Flash::error(trans('interface.aTechnicalProblemOccurred'));
            return redirect(route('users-files.index'));
        }
        Flash::error(trans('interface.aTechnicalProblemOccurred'));
        Session::flush();
        return redirect(route('/home'));
    }
}
