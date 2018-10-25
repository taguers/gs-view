<template>
  <div class="box-body">
    <div class="form-group">
      <input type="text" class="form-control" v-model="search" placeholder="Procurar">
    </div>
    <h1 v-if="!isLoaded">Não há dados para serem exibidos.</h1>
    <div class="table-responsive" v-if="isLoaded">
      <table class="table table-striped table-hover">
          <thead>
              <tr>
                  <th scope="col">Consultor</th>
                  <th scope="col" @click="sort('cliente')">Cliente<i class="fas fa-sort-alpha-down float-right"></i></th>
                  <th scope="col">Código</th>
                  <th scope="col">Contato</th>
                  <th scope="col">Data</th>
                  <th scope="col">Hora</th>
                  <th scope="col">C pontual</th>
                  <th scope="col">C claro</th>
                  <th scope="col">C voz adequada</th>
                  <th scope="col">C didat</th>
                  <th scope="col">C comprom</th>
                  <th scope="col">C object</th>
                  <th scope="col">Nota</th>
                  <th scope="col">Observação</th>
                  <th scope="col">Inclusão</th>
              </tr>
          </thead>
          <tbody>
              <tr v-for="relacionamento in (listaOrdenada, listaFiltrada)" :key="relacionamento.id"> 
                <!-- <td>{{relacionamento.id}}</td> -->
                <td>{{relacionamento.title}}</td>
                <td>{{relacionamento.userId}}</td>
                <td>{{relacionamento.completed}}</td>
			          <td>{{relacionamento.title}}</td>
                <td>{{relacionamento.userId}}</td>
                <td>{{relacionamento.completed}}</td>
			          <td>{{relacionamento.title}}</td>
                <td>{{relacionamento.userId}}</td>
                <td>{{relacionamento.completed}}</td>
			          <td>{{relacionamento.title}}</td>
                <td>{{relacionamento.userId}}</td>
                <td>{{relacionamento.completed}}</td>
			          <td>{{relacionamento.title}}</td>
                <td>{{relacionamento.userId}}</td>
                <td>{{relacionamento.completed}}</td>
              </tr>
          </tbody>
      </table>
    </div>
    <br />
    <button @click="prevPage" class="float-left btn btn-outline-info btn-sm"><i class="fas fa-arrow-left"></i> Anterior</button> 
    <button @click="nextPage" class="float-right btn btn-outline-info btn-sm">Próximo <i class="fas fa-arrow-right"></i></button>
  </div>
  <!-- {{this.relacionamentos.length}} -->
</template>

<script>
import axios from 'axios';

export default {
  data: () => ({
    relacionamentos: [],
    currentSort:'id',
    currentSortDir:'asc',
    searchSelection: '',
    pageSize: 10,
    currentPage: 1,
    isLoaded: false,
    search: ''
  }),

  methods: {
    sort:function(s) {
      if(s === this.currentSort) {
        this.currentSortDir = this.currentSortDir==='asc'?'desc':'asc';
      }
      this.currentSort = s;
    },
    nextPage:function() {
      if((this.currentPage*this.pageSize) < this.relacionamentos.length) this.currentPage++;
    },
    prevPage:function() {
      if(this.currentPage > 1) this.currentPage--;
    }
  },

  computed: {
    listaOrdenada:function() {
      return this.relacionamentos.sort((a,b) => {
        let modifier = 1;
        if(this.currentSortDir === 'desc') modifier = -1;
        if(a[this.currentSort] < b[this.currentSort]) return -1 * modifier;
        if(a[this.currentSort] > b[this.currentSort]) return 1 * modifier;
        return 0;
      }).filter((row, index) => {
        let start = (this.currentPage-1)*this.pageSize;
        let end = this.currentPage*this.pageSize;
        if(index >= start && index < end) return true;
      });
    },
    listaFiltrada () {
	  return this.relacionamentos.filter((data) => {
          let title = data.title.toLowerCase().match(this.search.toLowerCase());
	 	// let cliente = data.cliente.toLowerCase().match(this.search.toLowerCase());  
	     // let contato = data.contato.toLowerCase().match(this.search.toLowerCase());
		// let datahora = data.data === null ? '' : data.data.date.toLowerCase().match(this.search.toLowerCase());
		// let datainclusao = data.datainclusao === null ? '' : data.datainclusao.date.toLowerCase().match(this.search.toLowerCase());
          // let atendenteseidentificou = data.atendenteseidentificou.toLowerCase().match(this.search.toLowerCase());
          // let atendentefoiclaro = data.atendentefoiclaro.toLowerCase().match(this.search.toLowerCase());
          // let atendentevozadequada = data.atendentevozadequada.toLowerCase().match(this.search.toLowerCase());
          // let notaatendimento = data.notaatendimento.toLowerCase().match(this.search.toLowerCase());
          // let observacoes = data.observacoes.toLowerCase().match(this.search.toLowerCase());
          // let chamado = data.chamado.toLowerCase().match(this.search.toLowerCase());
          return title;
         }).filter((row, index) => {
           let start = (this.currentPage - 1) * this.pageSize;
           let end = this.currentPage * this.pageSize;
           if (index >= start && index < end) return true;
         })
  	}
  },

  mounted () {
    axios.get(`${process.env.VUE_APP_API_RELACIONAMENTO}`)
      .then(response => {
        this.relacionamentos = [...response.data]
        this.isLoaded = true
      })
      .catch(error => console.error("Error =>", error))
  },

}

</script>

<style>
th {
  cursor:pointer;
  /* width: 500px !important; */
  white-space: nowrap;
}

tr {
  white-space: nowrap;
}

</style>
