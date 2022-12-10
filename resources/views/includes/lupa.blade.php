<button title="Diminua a fonte do site" class="btn text-white" id="diminuirFonte"><i class="fas fa-search-minus"></i></button>
<button title="Aumente a fonte do site" class="btn text-white" id="aumentarFonte"><i class="fas fa-search-plus"></i></button>

@push('scripts')
    <script>
        const botaoDiminuir = document.getElementById('diminuirFonte');
        const botaoAumentar = document.getElementById('aumentarFonte');
        
        botaoDiminuir.addEventListener('click', selectFont);
        botaoAumentar.addEventListener('click', selectFont2);
        
        const navLinks = document.getElementsByClassName('nav-link');
        const subLinks = document.getElementsByClassName('sublink');
        const textHome = document.getElementsByClassName('text-home');
        const tituloObc = document.getElementsByClassName('titulo-obc');
        const subtituloObc = document.getElementsByClassName('subtitulo-obc');
        const equipeNome = document.getElementsByClassName('equipe-nome');
        const equipeOcupacao = document.getElementsByClassName('equipe-ocupação');
        const accordionBody = document.getElementsByClassName('accordionbody-obc');
        const accordionBtn = document.getElementsByClassName('accordionbtn-obc');
        const letraOBC = document.getElementsByClassName('letra-obc');
        const termoOBC = document.getElementsByClassName('termo-obc');
        const sigificadoOBC = document.getElementsByClassName('significado-obc');
        const titulocardGrafico = document.getElementsByClassName('titulocard_grafico');
        const subtitulocardGrafico = document.getElementsByClassName('subtitulocard_grafico');
        const tituloGraficos = document.getElementsByClassName('titulo_graficos');
        const tooltipOc = document.getElementsByClassName('tooltip-oc');
        const tituloselectOc = document.getElementsByClassName('tituloselect_oc');
        const inputOc = document.getElementsByClassName('input_oc');
        const selectOc = document.getElementsByClassName('select_oc');
        const btnselectOc = document.getElementsByClassName('btnselect_oc');
        
        function selectFont(){
            mudarClasse(navLinks, getFontSize(navLinks, "menos"));
            mudarClasse(subLinks, getFontSize(subLinks, "menos"));
            mudarClasse(textHome, getFontSize(textHome, "menos"));
            mudarClasse(tituloObc, getFontSize(tituloObc, "menos"));
            mudarClasse(subtituloObc, getFontSize(subtituloObc, "menos"));
            mudarClasse(equipeNome, getFontSize(equipeNome, "menos"));
            mudarClasse(equipeOcupacao, getFontSize(equipeOcupacao, "menos"));
            mudarClasse(accordionBody, getFontSize(accordionBody, "menos"));
            mudarClasse(accordionBtn, getFontSize(accordionBtn, "menos"));
            mudarClasse(letraOBC, getFontSize(letraOBC, "menos"));
            mudarClasse(termoOBC, getFontSize(termoOBC, "menos"));
            mudarClasse(sigificadoOBC, getFontSize(sigificadoOBC, "menos"));
            mudarClasse(tituloGraficos, getFontSize(tituloGraficos, "menos"));
            mudarClasse(titulocardGrafico, getFontSize(titulocardGrafico, "menos"));
            mudarClasse(subtitulocardGrafico, getFontSize(subtitulocardGrafico, "menos"));
            mudarClasse(tooltipOc, getFontSize(tooltipOc, "menos"));
            mudarClasse(tituloselectOc, getFontSize(tituloselectOc, "menos"));
            mudarClasse(inputOc, getFontSize(inputOc, "menos"));
            mudarClasse(selectOc, getFontSize(selectOc, "menos"));
            mudarClasse(btnselectOc, getFontSize(btnselectOc, "menos"));
        }

        function selectFont2(){
            mudarClasse(navLinks, getFontSize(navLinks, "mais"));
            mudarClasse(subLinks, getFontSize(subLinks, "mais"));
            mudarClasse(textHome, getFontSize(textHome, "mais"));
            mudarClasse(tituloObc, getFontSize(tituloObc, "mais"));
            mudarClasse(subtituloObc, getFontSize(subtituloObc, "mais"));
            mudarClasse(equipeNome, getFontSize(equipeNome, "mais"));
            mudarClasse(equipeOcupacao, getFontSize(equipeOcupacao, "mais"));
            mudarClasse(accordionBody, getFontSize(accordionBody, "mais"));
            mudarClasse(accordionBtn, getFontSize(accordionBtn, "mais"));
            mudarClasse(letraOBC, getFontSize(letraOBC, "mais"));
            mudarClasse(termoOBC, getFontSize(termoOBC, "mais"));
            mudarClasse(sigificadoOBC, getFontSize(sigificadoOBC, "mais"));
            mudarClasse(tituloGraficos, getFontSize(tituloGraficos, "mais"));
            mudarClasse(titulocardGrafico, getFontSize(titulocardGrafico, "mais"));
            mudarClasse(subtitulocardGrafico, getFontSize(subtitulocardGrafico, "mais"));
            mudarClasse(tooltipOc, getFontSize(tooltipOc, "mais"));
            mudarClasse(tituloselectOc, getFontSize(tituloselectOc, "mais"));
            mudarClasse(inputOc, getFontSize(inputOc, "mais"));
            mudarClasse(selectOc, getFontSize(selectOc, "mais"));
            mudarClasse(btnselectOc, getFontSize(btnselectOc, "mais"));
        }

        function getFontSize($classe, $propiedade){
            for(i = 0; i < $classe.length; i++) {
                var style = window.getComputedStyle($classe[i], null).getPropertyValue('font-size');
            }
            var fontSize = parseFloat(style);

            if ($propiedade == "menos") {
                fontSize = (fontSize - 1) + 'px';
            }
            else if ($propiedade == "mais"){
                fontSize = (fontSize + 1) + 'px';
            }

            return fontSize;
        }

        function mudarClasse ($classe, $valorAtual) {
            for(i = 0; i < $classe.length; i++) {
                $classe[i].style.fontSize = $valorAtual;
            }
        }
    </script>
@endpush