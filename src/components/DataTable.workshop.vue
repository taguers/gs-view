<template>
  <div class="box-body">
    <div class="form-group">
      <input type="text" class="form-control" v-model="search" placeholder="Procurar">
    </div>
    <h1 v-if="!isLoaded">Não há dados para serem exibidos.</h1>
    <div class="table-responsive" v-if="isLoaded">
      <table class="table table-striped table-bordered">
          <thead>
			<tr> 
				<!-- <th scope="col" @click="sort('id')">Id</th> -->
				<th scope="col">Data</th>
				<th scope="col" @click="sort('')">Título<i class="fas fa-sort-alpha-down float-right"></i></th>								
				<th scope="col" @click="sort('')">Instrutor<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Empresa<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Nome<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Alimentação<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Ritmo<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Divulgação<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Localização<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Instalações<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Carga horária<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Atendimento recepção<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Atendimento pré-evento<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Palestrante<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Qualidade geral<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Apresentação<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Clareza<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Material<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Esclareceu dúvidas<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Conteúdo apresentado<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Sugestão próximos eventos<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Como soube<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Utiliza Condomínio Web<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Utiliza Adm. web<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Utiliza controle Doc.<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Utiliza conciliação<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Utiliza NF web<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Utiliza Compl. Emissão Form.<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Utiliza Gestão Pessoal Folha Web<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Boleto por e-mail<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Leitura Arq. Retorno<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Impressão cheques<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Pgto. Eletrônico<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Envio boleto de cobrança<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Acompanhamentos em multa<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Impressão formulários<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Programação de rateio<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Apuração de tributos<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Isenção síndico folha web<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Integração lançamentos<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Orçamento previsão<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Controle de contratos<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Controle de consumos<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Débito automático<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Controle pagamentos<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Notas de reembolso<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Cartas confecção<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('')">Personalização<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col">Já fez treinamentos</th>
				<th scope="col" @click="sort('')">Bancos<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col" @click="sort('observacao')">Observações<i class="fas fa-sort-alpha-down float-right"></i></th>
				<th scope="col">Data inclusão</th>
			</tr>
          </thead>
          <tbody>
              <tr v-for="workshop in (listaOrdenada, listaFiltrada)" :key="workshop.id">
				<!-- <td>{{workshop.id}}</td>  -->
				<td v-if="workshop.data">{{workshop.data.date | formatDate	}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.titulo">{{workshop.titulo}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.instrutor">{{workshop.instrutor}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.empresa">{{workshop.empresa}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.nome">{{workshop.nome}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.alimentacao">{{workshop.alimentacao}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.ritmo">{{workshop.ritmo}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.divulgacao">{{workshop.divulgacao}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.localizacao">{{workshop.localizacao}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.instalacoes">{{workshop.instalacoes}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.cargahoraria">{{workshop.cargahoraria}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.atendimentorecepcao">{{workshop.atendimentorecepcao}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.atendimentopreevento">{{workshop.atendimentopreevento}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.palestrante">{{workshop.palestrante}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.qualidadegeral">{{workshop.qualidadegeral}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.apresentacao">{{workshop.apresentacao}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.clareza">{{workshop.clareza}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.material">{{workshop.material}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.esclareceuduvidas">{{workshop.esclareceuduvidas}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.conteudoapresentado">{{workshop.conteudoapresentado}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.sugestaoproximoseventos">{{workshop.sugestaoproximoseventos}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.comosoube">{{workshop.comosoube}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.utilizacondweb">{{workshop.utilizacondweb}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.utilizaadmweb">{{workshop.utilizaadmweb}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.utilizacontroledocs">{{workshop.utilizacontroledocs}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.utilizaconciliacao">{{workshop.utilizaconciliacao}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.utilizanfweb">{{workshop.utilizanfweb}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.utilizacomplemissaoform">{{workshop.utilizacomplemissaoform}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.utilizagestaopessoalfweb">{{workshop.utilizagestaopessoalfweb}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.boletoporemail">{{workshop.boletoporemail}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.leituraarqretorno">{{workshop.leituraarqretorno}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.impressaocheques">{{workshop.impressaocheques}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.pagtoeletronico">{{workshop.pagtoeletronico}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.envioboletocobranca">{{workshop.envioboletocobranca}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.acompanhamentosemmulta">{{workshop.acompanhamentosemmulta}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.impressaoformularios">{{workshop.impressaoformularios}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.programacaoderateio">{{workshop.programacaoderateio}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.apuracaotributos">{{workshop.apuracaotributos}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.isencaosindicofolhaweb">{{workshop.isencaosindicofolhaweb}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.integracaolancamentos">{{workshop.integracaolancamentos}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.orcamentoprevisao">{{workshop.orcamentoprevisao}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.controledecontratos">{{workshop.controledecontratos}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.controledeconsumos">{{workshop.controledeconsumos}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.debitoautomatico">{{workshop.debitoautomatico}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.controlepagamentos">{{workshop.controlepagamentos}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.notasdereembolso">{{workshop.notasdereembolso}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.cartasconfeccao">{{workshop.cartasconfeccao}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.personalizacao">{{workshop.personalizacao}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.jafeztreinamentos">{{workshop.jafeztreinamentos}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.bancos">{{workshop.bancos}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.observacoes">{{workshop.observacoes}}</td>
				<td v-else="">-</td>
				<td v-if="workshop.datainclusao">{{workshop.datainclusao.date | formatDate}}</td>
				<td v-else="">-</td>
              </tr>
          </tbody>
      </table>
    </div>
    <br />

	<div class="box-pagination">
		<div class="row">
			<div class="col-md-5">
				<label>Mostrando {{ from }} até {{ to }} de {{ totalLength }} Registros.</label>
			</div>
			<div class="col-md-7">
				<ul class="pagination">
					<li>
						<label style="margin:7px 5px;">Página </label>
					</li>

					<li>
						<button @click="prevPage" class="float-left btn btn-outline-info btn-sm"><i class="fas fa-arrow-left"></i></button> 
					</li>
					
					<li class="">
						<input id="pagination-number" class="form-control" maxlength="5" style="text-align:center; width: 55px !important;" type="text" :value="currentPage"  />
					</li>
					
					<li v-if="currentPage>totalPages" class="next disabled">
					<li v-else="" class="next">
						<button @click="nextPage" class="float-right btn btn-outline-info btn-sm"><i class="fas fa-arrow-right"></i></button>
					</li>

					<li>
						<label style="margin:7px 5px;"> de {{ totalPages }}.</label>
					</li>
				</ul>
			</div>
		</div>
  	</div>
  </div>
</template>

<script>
import axios from "axios"
import Moment from 'moment'

export default {
  data: () => ({
    workshops: [],
    currentSort:'id',
    currentSortDir:'asc',
    searchSelection: '',
    pageSize: 5,
    currentPage: 1,
    totalLength: 1,
    totalPages: 1,
    isLoaded: false,
    search: '',
    from: 0,
    to: 0
  }),

  methods: {
    sort: function(s) {
      if (s === this.currentSort) {
        this.currentSortDir = this.currentSortDir === "asc" ? "desc" : "asc";
      }
      this.currentSort = s;
    },
    nextPage: function() {
	 if (this.currentPage * this.pageSize < this.totalLength)
	 {
	   this.from = this.from+this.pageSize;
	   this.to = this.to+this.pageSize;
	   this.currentPage++;
	 }
    },
    prevPage: function() {
	 if (this.currentPage > 1) 
	 {
        this.from = this.from-this.pageSize;
	   this.to = this.to-this.pageSize;
	   this.currentPage--;
	 }
    },
    goToPage: function(pn){
	 if (pn != this.currentPage) 
	 {
	   this.currentPage = pn;
	 }
    }
  },

  computed: {
    listaOrdenada: function() {
      return this.workshops.sort((a, b) => {
          let modifier = 1;
          if (this.currentSortDir === "desc") modifier = -1;
          if (a[this.currentSort] < b[this.currentSort]) return -1 * modifier;
          if (a[this.currentSort] > b[this.currentSort]) return 1 * modifier;
          return 0;
        }).filter((row, index) => {
          let start = (this.currentPage - 1) * this.pageSize;
          let end = this.currentPage * this.pageSize;
          if (index >= start && index < end) return true;
        })
    },
    listaFiltrada () {
	  return this.workshops.filter((data) => {
		let datah = data.data === null ? '' : Moment(String(data.data.date)).locale('pt').format('L').toLowerCase().match(this.search.toLowerCase());
		let titulo = data.titulo.toLowerCase().match(this.search.toLowerCase());
		let instrutor = data.instrutor.toLowerCase().match(this.search.toLowerCase());
		let empresa = data.empresa.toLowerCase().match(this.search.toLowerCase());
		let nome = data.nome.toLowerCase().match(this.search.toLowerCase());
		let alimentacao = data.alimentacao.toLowerCase().match(this.search.toLowerCase());
		let ritmo = data.alimentacao.toLowerCase().match(this.search.toLowerCase());
		let divulgacao = data.divulgacao.toLowerCase().match(this.search.toLowerCase());
		let localizacao = data.localizacao.toLowerCase().match(this.search.toLowerCase());
		let instalacoes = data.instalacoes.toLowerCase().match(this.search.toLowerCase());
		let cargahoraria = data.cargahoraria.toLowerCase().match(this.search.toLowerCase());
		let atendimentorecepcao = data.atendimentorecepcao.toLowerCase().match(this.search.toLowerCase());
		let atendimentopreevento = data.atendimentopreevento.toLowerCase().match(this.search.toLowerCase());
		let palestrante = data.palestrante.toLowerCase().match(this.search.toLowerCase());
		let qualidadegeral = data.qualidadegeral.toLowerCase().match(this.search.toLowerCase());
		let apresentacao = data.apresentacao.toLowerCase().match(this.search.toLowerCase());
		let clareza = data.clareza.toLowerCase().match(this.search.toLowerCase());
		let material = data.material.toLowerCase().match(this.search.toLowerCase());
		let esclareceuduvidas = data.esclareceuduvidas.toLowerCase().match(this.search.toLowerCase());
		let conteudoapresentado = data.conteudoapresentado.toLowerCase().match(this.search.toLowerCase());
		let sugestaoproximoseventos = data.sugestaoproximoseventos.toLowerCase().match(this.search.toLowerCase());
		let comosoube = data.comosoube.toLowerCase().match(this.search.toLowerCase());
		let utilizacondweb = data.utilizacondweb.toLowerCase().match(this.search.toLowerCase());
		let utilizaadmweb = data.utilizaadmweb.toLowerCase().match(this.search.toLowerCase());
		let utilizacontroledocs = data.utilizacontroledocs.toLowerCase().match(this.search.toLowerCase());
		let utilizaconciliacao = data.utilizaconciliacao.toLowerCase().match(this.search.toLowerCase());
		let utilizanfweb = data.utilizanfweb.toLowerCase().match(this.search.toLowerCase());
		let utilizacomplemissaoform = data.utilizacomplemissaoform.toLowerCase().match(this.search.toLowerCase());
		let boletoporemail = data.boletoporemail.toLowerCase().match(this.search.toLowerCase());
		let leituraarqretorno = data.leituraarqretorno.toLowerCase().match(this.search.toLowerCase());
		let impressaocheques = data.impressaocheques.toLowerCase().match(this.search.toLowerCase());
		let pagtoeletronico = data.pagtoeletronico.toLowerCase().match(this.search.toLowerCase());
		let envioboletocobranca = data.envioboletocobranca.toLowerCase().match(this.search.toLowerCase());
		let acompanhamentosemmulta = data.acompanhamentosemmulta.toLowerCase().match(this.search.toLowerCase());
		let impressaoformularios =  data.impressaoformularios.toLowerCase().match(this.search.toLowerCase());
		let programacaoderateio =  data.programacaoderateio.toLowerCase().match(this.search.toLowerCase());
		let apuracaotributos = data.apuracaotributos.toLowerCase().match(this.search.toLowerCase());
		let isencaosindicofolhaweb = data.isencaosindicofolhaweb.toLowerCase().match(this.search.toLowerCase());
		let integracaolancamentos = data.integracaolancamentos.toLowerCase().match(this.search.toLowerCase());
		let orcamentoprevisao = data.orcamentoprevisao.toLowerCase().match(this.search.toLowerCase());
		let controledecontratos = data.controledecontratos.toLowerCase().match(this.search.toLowerCase());
		let controledeconsumos = data.controledeconsumos.toLowerCase().match(this.search.toLowerCase());
		let debitoautomatico = data.debitoautomatico.toLowerCase().match(this.search.toLowerCase());
		let controlepagamentos = data.controlepagamentos.toLowerCase().match(this.search.toLowerCase());
		let notasdereembolso = data.notasdereembolso.toLowerCase().match(this.search.toLowerCase());
		let cartasconfeccao = data.cartasconfeccao.toLowerCase().match(this.search.toLowerCase());
		let personalizacao = data.personalizacao.toLowerCase().match(this.search.toLowerCase());
		let jafeztreinamentos = data.jafeztreinamentos.toLowerCase().match(this.search.toLowerCase());
		let bancos = data.bancos.toLowerCase().match(this.search.toLowerCase());
		let observacoes = data.observacoes.toLowerCase().match(this.search.toLowerCase());
		let datainclusao = data.datainclusao === null ? '' : Moment(String(data.datainclusao.date)).locale('pt').format('L').toLowerCase().match(this.search.toLowerCase());
		// let utilizagestaopessoalfweb = data.utilizagestaopessoalfweb.toLowerCase().match(this.search.toLowerCase());
		return (datah 					
			|| titulo					
			|| instrutor				
			|| empresa					
			|| nome					
			|| alimentacao				
			|| ritmo					
			|| divulgacao				
			|| localizacao				
			|| instalacoes				
			|| cargahoraria			
			|| atendimentorecepcao		
			|| atendimentopreevento	
			|| palestrante				
			|| qualidadegeral			
			|| apresentacao			
			|| clareza					
			|| material				
			|| esclareceuduvidas		
			|| conteudoapresentado		
			|| sugestaoproximoseventos	
			|| comosoube				
			|| utilizacondweb			
			|| utilizaadmweb			
			|| utilizacontroledocs		
			|| utilizaconciliacao		
			|| utilizanfweb			
			|| utilizacomplemissaoform	
			|| boletoporemail			
			|| leituraarqretorno		
			|| impressaocheques		
			|| pagtoeletronico			
			|| envioboletocobranca		
			|| acompanhamentosemmulta	
			|| impressaoformularios	
			|| programacaoderateio		
			|| apuracaotributos		
			|| isencaosindicofolhaweb	
			|| integracaolancamentos	
			|| orcamentoprevisao		
			|| controledecontratos		
			|| controledeconsumos		
			|| debitoautomatico		
			|| controlepagamentos		
			|| notasdereembolso		
			|| cartasconfeccao			
			|| personalizacao			
			|| jafeztreinamentos		
			|| bancos					
			|| observacoes				
			|| datainclusao)			
			// || utilizagestaopessoalfweb)
         }).filter((row, index) => {
           let start = (this.currentPage - 1) * this.pageSize;
           let end = this.currentPage * this.pageSize;
           if (index >= start && index < end) return true;
         })
    }
  },

  mounted () {
    axios.get(`${process.env.VUE_APP_API_WORKSHOP}`)
      .then(response => {
	   this.workshops = [...response.data]
	   this.totalLength = this.workshops.length
	   this.totalPages = Math.floor(this.totalLength/this.pageSize) === 0 ? 1 : Math.floor(this.totalLength/this.pageSize)
	   this.isLoaded = true
	   this.from = 1
	   this.to = this.pageSize
      })
      .catch(error => {console.log("Error =>", error),this.isLoaded = false})
  }
};
</script>

<style>
th {
  cursor: pointer;
  /* width: 500px !important; */
  white-space: nowrap;
}

tr {
  white-space: nowrap;
}
</style>
