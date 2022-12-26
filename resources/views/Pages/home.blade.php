@extends("layouts.home")
@section('content')
<livewire:home>
@endsection
@section('script')
   <script>
         window.addEventListener('close-modal', event => {
         
         $("#create").modal('hide');
         $("recents").modal('hide');
         
     })

     
    </script> 
@endsection