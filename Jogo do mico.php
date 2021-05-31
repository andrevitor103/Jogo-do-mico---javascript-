<!DOCTYPE html>
<html>
<head>
	<title>Jogo do Mico</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script type="text/javascript">
	
	var escolha = [];
	var acertou = 0;
	var tentativas = 0;
	var escolhas = [];

	var imagens = ['img/leao.jpg', 'img/arara.jpg', 'img/elefante.jpg', 'img/gorila.jpeg', 'img/tigre.jpg', 'img/leao.jpg', 'img/arara.jpg', 'img/elefante.jpg', 'img/gorila.jpeg', 'img/tigre.jpg' ];

	var animais = ['fundoCard1Animal', 'fundoCard2Animal', 'fundoCard3Animal', 'fundoCard4Animal', 'fundoCard5Animal','fundoCard6Animal', 'fundoCard7Animal', 'fundoCard8Animal', 'fundoCard9Animal', 'fundoCard10Animal'];


	onload = function(){
		var posicao = [];
		var valor;
		var contador = 0;
		var zero = false;
		var numeros = [];
		var addImagem = [];
		var imagem;

		while((imagens.length > 0) && (animais.length > 0)){
		
		posicao.push(Math.floor(Math.random() * (Math.floor(10) - Math.ceil(1))) + Math.ceil(1));

		contador++;

		if((animais.find(res => res == "fundoCard"+posicao[posicao.length - 1]+"Animal") != undefined) && (posicao[posicao.length - 1] != 0)){
		

		if(contador > 10){
			console.log('Parou break');
			break;
		}

		numeros.push(posicao[posicao.length - 1]);

		imagem = Math.floor(Math.random() * (Math.floor(imagens.length - 1) - Math.ceil(1))) + Math.ceil(1);

		while((imagens[imagem] == undefined) && (imagens.length > 0)){
			console.log('Lacooo');
			imagem = Math.floor(Math.random() * (Math.floor(imagens.length - 1) - Math.ceil(1))) + Math.ceil(1);
			}

		
		document.getElementById("fundoCard"+posicao[posicao.length - 1]+"Animal").firstElementChild.src = imagens[imagem];
				
		addImagem.push("fundoCard"+posicao[posicao.length - 1]+"Animal");

		imagens.splice(imagem, 1);
		animais.splice(animais.indexOf("fundoCard"+posicao[posicao.length - 1]+"Animal"), 1);



		}else{
			// console.log('Não acou', "fundoCard"+posicao[posicao.length - 1]+"Animal");
			posicao.splice(posicao.length - 1, 1);
		}
		}



		if(imagens.length > 0){
			var i = 0;
			imagens.forEach(res => {
				document.getElementById(animais[i]).firstElementChild.src = res;
				console.log(imagens);
				i++;
			});
		animais = [];
		imagens = [];
		console.log('---------------');
		console.log(imagens);
		console.log(animais);
		document.getElementById('numTentativas').innerHTML = "Tentativas: " + getTentativas();
		
		}
	}


	function escolheu(id){
		console.log(id.id);

		if(escolha.length == 1){
			setEscolha(id.id);
			console.log(escolha);
			analisarEscolhas();
		}else{
			setEscolha(id.id);
			document.getElementById(id.id).style.opacity= '0';
		}
	}

	function analisarEscolhas(){
		console.log(escolha);

		var opcao1 = document.getElementById(escolha[0]+"Animal");
		var opcao2 = document.getElementById(escolha[1]+"Animal");

		if(opcao1 == opcao2){
			document.getElementById(getEscolha()[0]).style.opacity= '1';
			document.getElementById(getEscolha()[1]).style.opacity= '1';
			clearEscolha();
			return false;
		}
		console.log('Opcao1', opcao1.firstElementChild.src,'Opcao2', opcao2.firstElementChild.src);
		if(opcao1.firstElementChild.src == opcao2.firstElementChild.src){
			document.getElementById(getEscolha()[0]).style.opacity= '0';
			document.getElementById(getEscolha()[1]).style.opacity= '0';
			// document.getElementById('acertou').play();
			acertou++;
			if(acertou == 5){
				document.getElementById('body').innerHTML = "Ganhooou";
			}
		}else{
			document.getElementById(getEscolha()[0]).style.opacity= '1';
			document.getElementById(getEscolha()[1]).style.opacity= '1';
			document.getElementById('erro').play();
		}
		console.log('tentativas', tentativas);
		setTentativas();
		document.getElementById('numTentativas').innerHTML = "Tentativas: " + getTentativas();
		clearEscolha();
	}

	function setEscolha(id){
		console.log('escolhaaa');
		escolha.push(id);
	}

	function getEscolha(){
		return escolha;
	}

	function clearEscolha(){
		escolha = [];
	}

	function getTentativas(){
		return tentativas;
	}

	function setTentativas(){
		tentativas = tentativas + 1;
	}



</script>
</head>

<body id="body">

		<div class="card">
		<div class="card__itens" id="fundoCard1Animal"><img src=""></div>
		<div class="card__itens" id="fundoCard2Animal"><img src=""></div>
		<div class="card__itens" id="fundoCard3Animal"><img src=""></div>
		<div class="card__itens" id="fundoCard4Animal"><img src=""></div>
		<div class="card__itens" id="fundoCard5Animal"><img src=""></div>
		<div class="card__itens" id="fundoCard6Animal"><img src=""></div>
		<div class="card__itens" id="fundoCard7Animal"><img src=""></div>
		<div class="card__itens" id="fundoCard8Animal"><img src=""></div>
		<div class="card__itens" id="fundoCard9Animal"><img src=""></div>
		<div class="card__itens" id="fundoCard10Animal"><img src=""></div>

	</div>

	<div class="card">
		<div class="card__itens__fundo" id="fundoCard1" onclick="escolheu(this)"><img src="img/carta.jpg"></div>
		<div class="card__itens__fundo" id="fundoCard2" onclick="escolheu(this)"><img src="img/carta.jpg"></div>
		<div class="card__itens__fundo" id="fundoCard3" onclick="escolheu(this)"><img src="img/carta.jpg"></div>
		<div class="card__itens__fundo" id="fundoCard4" onclick="escolheu(this)"><img src="img/carta.jpg"></div>
		<div class="card__itens__fundo" id="fundoCard5" onclick="escolheu(this)"><img src="img/carta.jpg"></div>
		<div class="card__itens__fundo" id="fundoCard6" onclick="escolheu(this)"><img src="img/carta.jpg"></div>
		<div class="card__itens__fundo" id="fundoCard7" onclick="escolheu(this)"><img src="img/carta.jpg"></div>
		<div class="card__itens__fundo" id="fundoCard8" onclick="escolheu(this)"><img src="img/carta.jpg"></div>
		<div class="card__itens__fundo" id="fundoCard9" onclick="escolheu(this)"><img src="img/carta.jpg"></div>
		<div class="card__itens__fundo" id="fundoCard10" onclick="escolheu(this)"><img src="img/carta.jpg"></div>
	</div>

	<h2 id="numTentativas"></h2>

		<video id="erro">
			<source src="audio/erro.mp3" type="audio/mp3">
		</video>

	<!-- 	<video id="acertou">
			<source src="audio/acertou.mp3" type="audio/mp3">
		</video>

		<video id="virou">
			<source src="audio/virou.mp3" type="audio/mp3">
		</video> -->

		<!-- <video id="campeao">
			<source src="audio/campeao.mp3" type="audio/mp3">
		</video> -->

</body>


</html>