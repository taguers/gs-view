<template>
  <div class="col-md-12">
    <div class="form-group">
      <input type="text" class="form-control" v-model="search" placeholder="Search">
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-bordered" style="width:100%">
          <thead width="400px">
              <tr>
                <th scope="col">Id</th>
                <th scope="col" @click="sort('atendente')">Atendente <i class="fas fa-sort-alpha-down float-right"></i></th>
                <th scope="col">Cliente</th>
                <th scope="col">Data</th>
              </tr>
          </thead>
          <tbody>
              <tr v-for="(suporte, index) in filteredList" :key="index">
                <td>{{suporte.id}}</td> 
                <td>{{suporte.atendente}}</td>
                <td>{{suporte.cliente}}</td>
                <!-- <td>{{suporte.datainclusao.date}}</td> -->
              </tr>
          </tbody>
      </table>
    </div>
  <button @click="prevPage" class="float-left btn btn-outline-info btn-sm"><i class="fas fa-arrow-left"></i> Anterior</button> 
  <button @click="nextPage" class="float-right btn btn-outline-info btn-sm">Próximo <i class="fas fa-arrow-right"></i></button>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data: () => ({
    suportes: [],
    currentSort: "atendente",
    currentsortdir: "asc",
    search: "",
    searchselection: "",
    pagesize: 5,
    currentpage: 1
  }),

  methods: {
    sort: function(s) {
      if (s === this.currentSort) {
        this.currentSortDir = this.currentSortDir === "asc" ? "desc" : "asc";
      }
      this.currentSort = s;
    },
    nextPage: function() {
      if (this.currentPage * this.pageSize < this.suportes.length)
        this.currentPage++;
    },
    prevPage: function() {
      if (this.currentPage > 1) this.currentPage--;
    }
  },

  computed: {
    sortedActivity: function() {
      return this.suportes
        .sort((a, b) => {
          let modifier = 1;
          if (this.currentSortDir === "desc") modifier = -1;
          if (a[this.currentSort] < b[this.currentSort]) return -1 * modifier;
          if (a[this.currentSort] > b[this.currentSort]) return 1 * modifier;
          return 0;
        })
        .filter((row, index) => {
          let start = (this.currentPage - 1) * this.pageSize;
          let end = this.currentPage * this.pageSize;
          if (index >= start && index < end) return true;
        });
    },

    filteredList: function() {
      return this.suportes
        .filter((data) => {
          // let id = data.id.toLowerCase().match(this.search.toLowerCase());
          let atendente = data.atendente
            .toLowerCase()
            .match(this.search.toLowerCase());
          let cliente = data.cliente
            .toLowerCase()
            .match(this.search.toLowerCase());
          let contato = data.contato
            .toLowerCase()
            .match(this.search.toLowerCase());
          // let datahora = data.datainclusao.date.toLowerCase().match(this.search.toLowerCase());
          let atendenteseidentificou = data.atendenteseidentificou
            .toLowerCase()
            .match(this.search.toLowerCase());
          let atendentefoiclaro = data.atendentefoiclaro
            .toLowerCase()
            .match(this.search.toLowerCase());
          let atendentevozadequada = data.atendentevozadequada
            .toLowerCase()
            .match(this.search.toLowerCase());
          let notaatendimento = data.notaatendimento
            .toLowerCase()
            .match(this.search.toLowerCase());
          let observacoes = data.observacoes
            .toLowerCase()
            .match(this.search.toLowerCase());
          let chamado = data.chamado
            .toLowerCase()
            .match(this.search.toLowerCase());
          return (
            atendente ||
            cliente ||
            contato ||
            atendenteseidentificou ||
            atendentefoiclaro ||
            atendentevozadequada ||
            notaatendimento ||
            observacoes ||
            chamado
          );
        })
        .filter((row, index) => {
          let start = (this.currentPage - 1) * this.pageSize;
          let end = this.currentPage * this.pageSize;
          if (index >= start && index < end) return true;
        });
    }
  },

  mounted() {
    axios.get(`${process.env.VUE_APP_API_SUPORTE}`)
      .then(response => {
        this.suportesArray = [...response.data]
        this.isLoaded = true
      })
      .catch(error => console.error("Error =>", error))
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
