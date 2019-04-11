<?php

namespace Modules\Profile\Http\Controllers;

use Modules\Profile\Repositories\UserCertificateRepository;
use Modules\Profile\Repositories\UserRepository;
use Modules\Profile\Entities\UserCertificate as UserCertificate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Auth;
use App\User;
use Crypt;
use Response;
use Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Modules\Profile\Http\Requests\UserCertificateRequest as StoreRequest;

// !!!!!!!!!!!! uses FILEUSER :: class /////////

class UserCertificateController extends Controller
{
    /** @var  UserCertificateRepository */
    private $userCertificateRepository;

    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserCertificateRepository $userCertificateRepo, UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
        $this->userCertificateRepository = $userCertificateRepo;
    }

    /**
     * Display a listing of the UserCertificate.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $currentUser = Auth::User()->id;
        // dd($currentUser);
        $userCertificates = $this->userCertificateRepository->getCertificatesForCurrentUser($currentUser);
        // dd($userCertificates);
        return view('profile::userCertificates.index')
        ->with($userCertificates);
    }

    /**
     * Show the form for creating a new UserCertificate.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $currentUser = Auth::User()->id;
        $maxCertificateForUser = $this->userRepository->maxCertificateForUser($currentUser);
        $userCertificates = $this->userCertificateRepository->getCertificatesForCurrentUser($currentUser);
        $currentUserCertificateCount = $userCertificates['countCertificates'];
        $remainingCertificates = $maxCertificateForUser-$currentUserCertificateCount;
        
        if($currentUserCertificateCount < $maxCertificateForUser){
            Flash::success(trans('users.remainingCertificates'.'&nbsp;:'. $remainingCertificates));
            return view('profile::userCertificates.create');
        }
        elseif($currentUserCertificateCount == $maxCertificateForUser){
            Flash::error(trans('users.maxCertificatesReached'));
            return redirect(route('users-certificates.index'));
        }
        
    }

    /**
     * Store a newly created UserCertificate in database.
     *
     * @param CreateUserCertificateRequest $request
     *
     * @return Response
     */
    public function store(StoreRequest $request, ?User $user)
    {
        $currentUser = Auth::User()->id;
        $maxCertificateForUser = $this->userRepository->maxCertificateForUser($currentUser);
        $userCertificates = $this->userCertificateRepository->getCertificatesForCurrentUser($currentUser);
        $currentUserCertificateCount = $userCertificates['countCertificates'];
        
        // Si le quota n'est pas atteint
        if($currentUserCertificateCount == $maxCertificateForUser || $currentUserCertificateCount > $maxCertificateForUser){
            Flash::error(trans('users.maxCertificatesReached'));
            return redirect(route('users-certificates.index'));
        }
        // Si le quota est atteint
        elseif(!$currentUserCertificateCount == $maxCertificateForUser){
            // Get the file from the request
            $file = $request->file('upload_file');
            $fileSize = $file->getSize();
            $fileMimeType = $file->getMimeType();
            // dd($fileMimeType);
            $originalFileName = time().'-'.$request->file('upload_file')->getClientOriginalName();
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            $dirname = pathinfo($file, PATHINFO_DIRNAME);
            $basename = pathinfo($file, PATHINFO_BASENAME);
            
            // S'il n'y a pas de certificat enregistré, on en enregistre un
            // Et l'on assigne le rôle de candidat.
            
            // Store the contents to the database
            $userCertificate = new UserCertificate;
            $userCertificateData = 
                    [
                        'file_extension' => $extension, 
                        'file_size' => $fileSize, 
                        'file_mime' => $fileMimeType, 
                        'file_content' => file_get_contents($file), 
                        'file_type_id' => 1, 
                        'file_name' => $originalFileName, 
                        'user_id' => Auth::User()->id,
                        'created_at' => date(now()),
                        'visibility_id' => 0, 
                        'inhouse_validated' => 0, 
                        'inhouse_validation_status' => 'pending', 
                        'status_id' => 0 
                    ];
            $userCertificate->insert($userCertificateData);
            // Le certificat est enregistré
            Flash::success(trans('users.certificateAdded'));
        
            // Si l'utilisateur n'a encore aucun "son-role-verified"
            // On lui assigne le rôle de candidat
            // Une fois que son premier certificat sera validé, on retira ce rôle de candidate...
            // Et l'on réactivera ainsi l'accès au formulaire de création de certificats

            if(Auth::User()->hasRole('vendor') && !Auth::User()->hasRole('translator-verified')){
                Auth::User()->assignRole('candidate');
            }
            elseif(Auth::User()->hasRole('dtper') && !Auth::User()->hasRole('dtper-verified')){
                Auth::User()->assignRole('candidate');
            }
            elseif(Auth::User()->hasRole('developer') && !Auth::User()->hasRole('developer-verified')){
                Auth::User()->assignRole('candidate');
            }
            elseif(Auth::User()->hasRole('proorg') && !Auth::User()->hasRole('proorg-verified')){
                Auth::User()->assignRole('candidate');
            }
            elseif(Auth::User()->hasRole('academic') && !Auth::User()->hasRole('academic-verified')){
                Auth::User()->assignRole('candidate');
            }
            return redirect('/profile/users-certificates');
        }
    }

    public function toggleVisibility(Request $request)
    {
        $certificateId = Crypt::decrypt($request['certificate_id']);
        $userCertificate = UserCertificate::find($certificateId);
        
        if($userCertificate->inhouse_validation_status == 'pending'){  
            Flash::error(trans('users.activationOnValidatedOnly'));
            return redirect(route('users-certificates.index'));
        }
        elseif($userCertificate->inhouse_validation_status == 'asked'){   
            Flash::error(trans('users.activationAfterValidatedOnly'));
            return redirect(route('users-certificates.index'));
        }
        elseif($userCertificate->inhouse_validation_status == 'done'){
            if($userCertificate['user_id'] == \Auth::User()->id){
                if (empty($userCertificate)) {
                    Flash::error(trans('users.userCertificateNotFound'));
                    return redirect(route('users-certificates.index'));
                }
                elseif(!empty($userCertificate) && $userCertificate['visibility_id'] == '0'){
                    $userCertificate->visibility_id = '1';
                    $userCertificate->save();
                    Flash::success(trans('action.itemNowVisible'));
                    return redirect(route('users-certificates.index'));
                }
                elseif(!empty($userCertificate) && $userCertificate['visibility_id'] == '1'){
                    $userCertificate->visibility_id = '0';
                    $userCertificate->save();
                    Flash::success(trans('action.itemNowInvisible'));
                    return redirect(route('users-certificates.index'));
                }
                return redirect(route('users-certificates.index'));
            }
        }
        Flash::error(trans('interface.aProblemOccurred'));
    }

    public function toggleStatus(Request $request)
    {
        $certificateId = Crypt::decrypt($request['certificate_id']);
        $userCertificate = UserCertificate::find($certificateId);
        if($userCertificate->inhouse_validation_status == 'pending'){  
            Flash::error(trans('action.activationOnValidatedOnly'));
            return redirect(route('users-certificates.index'));
        }
        elseif($userCertificate->inhouse_validation_status == 'asked'){
            Flash::error(trans('action.activationAfterValidatedOnly')); 
            return redirect(route('users-certificates.index'));
        }
        elseif($userCertificate->inhouse_validation_status == 'done'){ 
            if($userCertificate['user_id'] == \Auth::User()->id){
                if (empty($userCertificate)) {
                    Flash::error(trans('users.userCertificateNotFound'));
                    return redirect(route('users-certificates.index'));
                }
                elseif(!empty($userCertificate) && $userCertificate['status_id'] == '0'){
                    $userCertificate->status_id = '1';
                    $userCertificate->save();
                    Flash::success(trans('action.itemNowVisible'));
                    return redirect(route('users-certificates.index'));
                }
                elseif(!empty($userCertificate) && $userCertificate['status_id'] == '1'){
                    $userCertificate->status_id = '0';
                    $userCertificate->save();
                    Flash::success(trans('action.itemNowInvisible'));
                    return redirect(route('users-certificates.index'));
                }
            }
        }
        Flash::error('interface.aProblemOccurred');
    }
    public function downloadUserCertificate(?User $user, Request $request)
    {
        $file = UserCertificate::where('id', Crypt::decrypt($request->userCertificateToDownload))
        ->firstOrFail(); 

        $fileContent = $file->file_content; // the generated file content
        $response = Response::make($fileContent, 200, [
            'Content-Type' => $file->file_path,
            'Content-Disposition' => 'attachment; filename='.$file->file_name.'',
        ]);
        Flash::warning(trans('action.scanWithAntiVirus'));
        return $response;
        redirect()->back();
    }

    /**
     * Show the form for editing the specified UserCertificate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userCertificate = UserCertificate::find($id);

        if (empty($userCertificate)) {
            Flash::error(trans('users.userCertificateNotFound'));
            return redirect(route('users-certificates.index'));
        }
        return view('users.user_certificates.edit')->with('userCertificate', $userCertificate);
    }


    /**
     * Remove the specified UserCertificate from database.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userCertificate = UserCertificate::find($id);
        if($userCertificate->inhouse_validation_status == 'pending'){
            if(Auth::Check()){
                if (empty($userCertificate) && Auth::User()->id == $userCertificate->user_id){
                    Flash::error(trans('users.userCertificateNotFound'));
                    return redirect(route('users-certificates.index'));
                }
                elseif(!empty($userCertificate) && $userCertificate->status_id == 1 && Auth::User()->id == $userCertificate->user_id){
                    Flash::error(trans('action.desactivateFirst'));
                    return redirect(route('users-certificates.index'));
                }
                elseif(!empty($userCertificate) && $userCertificate->status_id == 0 && Auth::User()->id == $userCertificate->user_id){
                    UserCertificate::destroy($id);
                    Flash::success(trans('users.userCertificateDeleted'));
                    return redirect(route('users-certificates.index'));
                }
                Flash::error(trans('users.impossibleToDeleteUserCertificate'));
                return redirect(route('users-certificates.index'));
            }
        }
        elseif($userCertificate->inhouse_validation_status == 'asked'){
            Flash::error(trans('users.impossibleToDeleteValidationAsked'));
            return redirect(route('users-certificates.index'));
        }
        elseif($userCertificate->inhouse_validation_status == 'done'){   
            Flash::error(trans('users.impossibleToDeleteValidationDone'));
            return redirect(route('users-certificates.index'));
        }
    }
}
