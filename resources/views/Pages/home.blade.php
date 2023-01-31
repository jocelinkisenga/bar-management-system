@extends("layouts.home")
@section('content')
<livewire:home>
@endsection
@section('script')
   <script>
         window.addEventListener('close-modal', event => {
        $("#recents").modal('hide'); 
     })

     
    </script> 
      <script type="text/javascript">  
        function printDiv() {  
           
            var divContents = document.getElementById("printDiv").innerHTML;  
            var printWindow = window.open('', '', 'height=200,width=400');  
            printWindow.document.write('<html><head><title>Print DIV Content</title>');  
            printWindow.document.write('</head><body >');  
            printWindow.document.write(divContents);  
            printWindow.document.write('</body></html>');  
            printWindow.document.close();  
            printWindow.print();  
        }  
        //printJS({printable:'fact', type: 'html', targetStyles: ['*']})

        function printCoupon() {  
           
            var divContents = document.getElementById("printCoupon").innerHTML;  
            var printWindow = window.open('', '', 'height=200,width=400');  
            printWindow.document.write('<html><head><title>Print DIV Content</title>');  
            printWindow.document.write('</head><body >');  
            printWindow.document.write(divContents);  
            printWindow.document.write('</body></html>');  
            printWindow.document.close();  
            printWindow.print();  
        }  
    </script> 
@endsection