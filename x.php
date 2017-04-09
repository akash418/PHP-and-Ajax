<html>
<head>
   <title>Drop Down Menu </title>
   <script src ="https://code.jquery.com/jquery-1.12.4.min.js"></script>
   <script type="text/javascript">
   $(document).ready(function(){
      $('.search-box input[type="text"]').on("keyup input",function(){
         //echo "workn";
         var input_val=$(this).val();
         var result_drop_down=$(this).siblings(" .result");
         if(input_val.length){
            $.get("x2.php",{term:input_val}).done(function(data){
               result_drop_down.html(data);
            });
         }
         else{
            result_drop_down.empty();
         }
      });

      $(document).on("click",".result p",function(){
         $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
         $(this).parent(".result").empty();
         window.alert("alert message");
      });
   });

   </script>

</head>
<body>
<div class="search-box">
<input type="text" autocomplete="off" placeholder="search " />
<div class="result"></div>
</div>
</body>
</html>