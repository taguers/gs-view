<template>
  <div class="col-md-12">
    <div class="form-group">
      <input type="text" class="form-control" v-model="search" placeholder="Search">
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-bordered" style="width:100%">
          <thead width="400px">
              <tr>
                  <th scope="col">Atendente</th>
                  <th scope="col" @click="sort('cliente')">Cliente <i class="fas fa-sort-alpha-down float-right"></i></th>
                  <th scope="col">Codigo</th>
                  <th scope="col">Data</th>
                  <th scope="col">Hora</th>
              </tr>
          </thead>
          <tbody>
              <tr v-for="(suporte, index) in (sortedActivity, filteredList)" :key="index">
                <!-- <td>{{index + 1}}</td> -->
                <td>{{suporte.atendente}}</td>
                <td>{{suporte.cliente}}</td>
                <td>{{suporte.codigo}}</td>
                <td>{{suporte.date}}</td>
                <td>{{suporte.hora}}</td>
              </tr>
          </tbody>
      </table>
    </div>
  <button @click="prevPage" class="float-left btn btn-outline-info btn-sm"><i class="fas fa-arrow-left"></i> Anterior</button> 
  <button @click="nextPage" class="float-right btn btn-outline-info btn-sm">Próximo <i class="fas fa-arrow-right"></i></button>
  </div>
</template>

<script>
/*eslint-disable*/
import axios from 'axios';

export default {
  data: 
  // () => ({
  //   users: [],
  //   currentSort:'name',
  //   currentSortDir:'asc',
  //   search: '',
  //   searchSelection: '',
  //   pageSize: 10,
  //   currentPage: 1
  // }),
  () => ({
    suportesArray: [],
    currentSort:'cliente',
    currentsortdir:'asc',
    search: '',
    searchselection: '',
    pagesize: 10,
    currentpage: 1
  }),

  methods: {
    sort:function(s) {
      if(s === this.currentSort) {
        this.currentSortDir = this.currentSortDir==='asc'?'desc':'asc';
      }
      this.currentSort = s;
    },
    nextPage:function() {
      if((this.currentPage*this.pageSize) < this.suportesArray.length) this.currentPage++;
    },
    prevPage:function() {
      if(this.currentPage > 1) this.currentPage--;
    }
  },

  computed: {
    sortedActivity:function() {
      return this.suportesArray.sort((a,b) => {
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

    filteredList () {
      return this.suportesArray.filter((data) => {
        let atendente = data.atendente.toLowerCase().match(this.search.toLowerCase());
        let cliente = data.cliente.toLowerCase().match(this.search.toLowerCase());
        let codigo = data.codigo.toLowerCase().match(this.search.toLowerCase());
        let date = data.date.toLowerCase().match(this.search.toLowerCase());
        let hora = data.hora.toLowerCase().match(this.search.toLowerCase());
        let cpontual = data.cpontual.toLowerCase().match(this.search.toLowerCase());
        let cclaro = data.cclaro.toLowerCase().match(this.search.toLowerCase());
        let cvozadeq = data.cvozadeq.toLowerCase().match(this.search.toLowerCase());
        let cdidat = data.cdidat.toLowerCase().match(this.search.toLowerCase());
        let cobjct = data.cobjct.toLowerCase().match(this.search.toLowerCase());
        let nota = data.cdidat.toLowerCase().match(this.search.toLowerCase());
        let observacao = data.observacao.toLowerCase().match(this.search.toLowerCase());
        let inclusao = data.inclusao.toLowerCase().match(this.search.toLowerCase());
        return consultor || cliente || codigo || data || hora ||
         cpontual || cclaro || cvozadeq || cdidat || cobjct ||
         nota || observacao || inclusao;
      }).filter((row, index) => {
        let start = (this.currentPage-1)*this.pageSize;
        let end = this.currentPage*this.pageSize;
        if(index >= start && index < end) return true;
      });
    }
  },

  created () {
    axios.post('http://localhost/gosoft/gs-view/src/include/suporte.php')
      .then(response => {
        this.suportesArray = response.data
	 })
	 .catch(error => {
		 console.log("Erro => ", error)
	 })
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
