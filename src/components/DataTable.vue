<template>
  <div class="col-md-12">
    <div class="form-group">
      <input type="text" class="form-control" v-model="search" placeholder="Search">
    </div>
    <h1 v-if="!isLoaded">Sem dados no momento</h1>
    <div class="table-responsive" v-if="isLoaded">
      <table class="table table-striped table-bordered" style="width:100%">
          <thead width="400px">
              <tr>
                  <th scope="col">Consultor</th>
                  <th scope="col" @click="sort('cliente')">Cliente <i class="fas fa-sort-alpha-down float-right"></i></th>
                  <th scope="col">Codigo</th>
                  <th scope="col">Data</th>
              </tr>
          </thead>
          <tbody>
              <tr v-for="(suporte, index) in filteredList" :key="index">
                <!-- <td>{{index + 1}}</td> -->
                <td>{{suporte.id}}</td>
                <td>{{suporte.title}}</td>
                <td>{{suporte.userId}}</td>
                <td>{{suporte.completed}}</td>
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
    searchselection: '',
    pagesize: 10,
    currentpage: 1,
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
      return this.suportesArray.filter(data => 
        data.title.toLowerCase().includes(this.search.toLowerCase()))
    }
  },

  mounted () {
    axios.get(`${process.env.VUE_APP_API_PLACEHOLDER}`)
      .then(response => {
        this.suportesArray = [...response.data]
        this.isLoaded = true
      })
      .catch(error => console.error('deu ruim'))
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
