// ajax script for getting state data
   $(document).on('change','#departement', function(){
      var departementID = $(this).val();
      if(departementID){
          $.ajax({
              type:'POST',
              url:'backend-script.php',
              data:{'departement_id':departementID},
              success:function(result){
                  $('#state').html(result);
                 
              }
          }); 
      }else{
          $('#state').html('<option value="">departement</option>');
          $('#city').html('<option value=""> State </option>'); 
      }
  });

    // ajax script for getting  city data
   $(document).on('change','#state', function(){
      var stateID = $(this).val();
      if(stateID){
          $.ajax({
              type:'POST',
              url:'backend-script.php',
              data:{'state_id':stateID},
              success:function(result){
                  $('#city').html(result);
                 
              }
          }); 
      }else{
          $('#city').html('<option value="">City</option>');
          
      }
  });