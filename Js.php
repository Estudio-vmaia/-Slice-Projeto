<script type="text/javascript">
	
	window.onload = function() {
	  loadVeiculos();
	}


	function loadVeiculos()
	{
	  $('#ClassficadosVeiculos').html('Carregando...'); 
	  $.ajax({
	    url: "veiculos.php"
	  }).done(function(data) { // 
	    $('#ClassficadosVeiculos').html(data);
	  });
	}

	function SetAcao(acao, id)
	{
	  document.getElementById('acao').value = acao;
	  document.getElementById('botaoAcao').innerText = acao;    
	  document.getElementById('idDelEdit').value = id;  

	  if(acao == 'cadastrar')
	  {
	  	document.getElementById('botaoDelete').style.display = 'none';
	  	//document.getElementById("FormCadastro").reset();
	  } 
	  else
	  {
	  	document.getElementById('botaoDelete').style.display = 'block';
	  }    

	  if(acao == 'editar')
	  {
	  	 $.ajax({
	          type: 'POST',
	          url: 'CRUD.php?acao='+acao+'&id='+id,
	          success: function (response) {
	          	//var len = response.length;
	          	var data = JSON.parse(response);

				$.each( data, function( index, dados ){
				    
				    console.log(index+' - '+dados);
				    if(index == 'marca')
				    {
				    	$("#marca").val(dados);	
				    }
				    else
				    {
				    	document.getElementById(index).value = dados;
				    }
				});	          	

       		    console.log(data);

	          }
	      });
	  }

	}

	function submitform()
	{
	  acao = document.getElementById('acao').value;

	  event.preventDefault();
	  
	  $.ajax({
	          type: 'POST',
	          url: 'CRUD.php?acao='+acao,
	          data: $('#FormCadastro').serialize(),
	          success: function () {
	            //alert('form was submitted');
	            document.getElementById('closeModal').click();  
	            //document.getElementById("FormCadastro").reset();
	            loadVeiculos();
	          }
	      });

	    return false;
	}

	function deletar()
	{
		document.getElementById('acao').value = 'deletar';		
	}

</script>