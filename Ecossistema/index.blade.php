
@extends('layouts.paginas')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/css/bootstrap-dialog.min.css" />
<link rel="stylesheet" href="{{ asset('/css/ecossistema.css')}}" />
@endsection


@section('content')
<div>
    <div class="container texto ecossistemas">
    <!--<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">-->    
    <p class="texto_descricao_ecossistema">   
    O Ecossistema de Iniciativas e Organizações mostra todas as entidades cadastradas na Plataforma UNA, 
    com atualização em tempo real. No mapa, também é possível visualizar as interconexões entre elas, de acordo com as informações validadas pelas próprias organizações. 
    Para mais detalhes, basta passar o mouse e selecionar aquela que você quer conhecer.
    </p>
    </div>
</div>
<div class="row" id="grafo-panel">
    <div id="canvas-zoom">
        <button id="zoom-plus" onclick="zoomIn();"><i class="glyphicon glyphicon-zoom-in" ></i></button>
        <button id="zoom-minus" onclick="zoomOut();"><i class="glyphicon glyphicon-zoom-out" ></i></button>
    </div>

    <div class="col-md-9">
        <div id="preloader">
            <div id="preloaderGif"></div>
            <div id="preloaderInfo">
                <span id="preloaderMsg">Carregando dados</span>
                <span id="preloaderCount"></span>
            </div>
        </div>
        <div id="graph-container"></div>
    </div> <!-- /col-md-9 -->
    <div class="col-md-3">

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#relacoes">Relações</a></li>
            <li><a data-toggle="tab" href="#temas">Temas</a></li>
            <li><a data-toggle="tab" href="#estados">Estados</a></li>
        </ul>

        <div class="tab-content">
            <div id="relacoes" class="tab-pane fade in active">  
                <h4>Relações</h4>
                <ul>
                    <li class="produtoServico"> 
                        <a href="javascript:;" onclick="edgeRelation('produtoServico')">
                            <span id="produtoServico-option"><i class="glyphicon glyphicon-minus"><href="#"></i></span>
                            Produto / Serviço
                        </a>
                        <a href="#" class= "tooltips" data-toggle="tooltip" data-placement="right" title="Relacionamento envolvendo compra e venda de produtos e/ou serviços
"><span class="glyphicon glyphicon-info-sign"></span></a>
                    </li>
                    <li class="projetoAcao">
                        <a href="javascript:;" onclick="edgeRelation('projetoAcao')">
                            <span id="projetoAcao-option"><i class="glyphicon glyphicon-minus"></i></span>
                            Projeto / Ação
                        </a>

                        <a href="#" data-toggle="tooltip" data-placement="right" title="Realização de atividades, projetos, eventos em parceria
    "><span class="glyphicon glyphicon-info-sign"></span></a>
                    </li>
                    <li class="redeColetivo">
                        <a href="javascript:;" onclick="edgeRelation('redeColetivo')">
                            <span id="redeColetivo-option"><i class="glyphicon glyphicon-minus"></i></span>
                            Rede Coletivo
                        </a>
                        <a href="#" data-toggle="tooltip" data-placement="right" title="Participações em redes, movimentos, conselhos da sociedade, entre outras"><span class="glyphicon glyphicon-info-sign"></span></a>
                    </li>
                    <li class="apoioInstitucional">
                        <a href="javascript:;" onclick="edgeRelation('apoioInstitucional')">
                            <span id="apoioInstitucional-option"><i class="glyphicon glyphicon-minus"></i></span>
                            Apoio Institucional
                        </a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Apoio entre iniciativas ou organizações não envolvendo recursos financeiros"><span class="glyphicon glyphicon-info-sign"> 
    </span></a>
                    </li>
                    <li class="apoioRecurso">
                        <a href="javascript:;" onclick="edgeRelation('apoioRecurso')">
                            <span id="apoioRecurso-option"><i class="glyphicon glyphicon-minus"></i></span>
                            Apoio Recurso
                        </a>
                        <a href="#" data-toggle="tooltip" data-placement="right" title="Apoio entre iniciativas ou organizações envolvendo recursos financeiros ou de outra ordem como doação de materiais e consultorias, entre outros
    " ><span class="glyphicon glyphicon-info-sign"></span></a>
                    </li>
                    <!--
                    <li>
                        <a href="javascript:;" onclick="edgeRelation('padrao')">Visão Padrão</a>
                    </li>
                    -->
                </ul>
                <div>
                    <h4>Pesquisar</h4>
                    <input type="text" id="pesquisarInput" >
                    <p id="resultadoContagem"></p>
                    <p id="resultado" class="list"></p>
                </div>
            </div>

            <div id="temas" class="tab-pane fade">
                <h4>Temas</h4>
                @if(isset($temas))
                <select name="tema" id="temaSelect" class="select2" style="width: 90%;">
                <option value="">Escolha um Tema</option>
                @foreach($temas as $t)
                <option value="{{$t->tema}}">{{$t->tema}}</option>
                @endforeach
                </select>
                @endif
                <br>
                <p id="resultadoTemasContagem"></p>
                <p id="resultadoTemas" class="list"></p>
            </div>

            <div id="estados" class="tab-pane fade">
                <h4>Estados</h4>
                @if(isset($estados))
                <select name="estado" id="estadoSelect" class="select2" style="width: 90%;">
                <option value="">Escolha um Estado(UF)</option>
                @foreach($estados as $e)
                <option value="{{$e->estado}}">{{$e->estado}}</option>
                @endforeach
                </select>
                @endif
                <br>
                <p id="resultadoEstadosContagem"></p>
                <p id="resultadoEstados" class="list"></p>
            </div>

        </div>
    </div> <!-- /col-md-3 -->
</div>

 
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/js/bootstrap-dialog.min.js" type="text/javascript"></script>
<!-- START SIGMA IMPORTS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sigma.js/1.2.1/sigma.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sigma.js/1.2.1/plugins/sigma.layout.forceAtlas2.min.js" ></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->
@include('ecossistema.script')
@endsection
