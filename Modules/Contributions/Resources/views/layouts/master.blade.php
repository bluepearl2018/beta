@extends('home')
@section('content')
public function index()
{
    // get the filename from somewhere
    $filename = getFilename();

    $file = Storage::disk('local')->get($filename);

    return View::make('your_view')
        ->with('file', $file);
}
@endsection