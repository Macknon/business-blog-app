@if (session('status'))
    <p style="text-align:center; color:#fff; 
    background:rgb(53, 199, 8); 
    padding: 17px 0; 
    margin-bottom: 16px; 
    font-weight:700;">
    {{session("status")}}
    </p> 
@endif