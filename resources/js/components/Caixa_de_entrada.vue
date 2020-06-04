<template>
  <div class="row">
      <!--@on-selected-rows-change="selectionChanged"-->
      <vue-good-table
        :columns="columns"
        :rows="rows"
        style="width:100%; margin-left:15px; margin-right:15px;"
        :select-options="{ 
    enabled: true,
  }"
        :search-options="{ enabled: true }"
      >
        <div slot="selected-row-actions">
          <button class="btn btn-success"><i class="nav-icon fas fa-check"></i> Marcar como lida</button>
          <button class="btn btn-warning"><i class="nav-icon fas fa-inbox"></i> Arquivar</button>
          <button class="btn btn-danger"><i class="nav-icon fas fa-trash"></i> Apagar</button>
        </div>
      </vue-good-table>
        
    </div>
</template>
<script>
export default {
  name: "my-component",
  data() {
    return {
      columns: [
        {
          label: "Nome",
          field: "name"
        },
        {
          label: "Assunto",
          field: "age",
        },
        {
          label: "Data",
          field: "createdAt",
          type: "text",
          /*dateInputFormat: "yyyy-MM-dd",
          dateOutputFormat: "MMM Do yy"*/
        },
      ],
      rows: [
        { id: 1, name: "Edson Gomes", age: "Teste de email", createdAt: "2020-06-02" },
        {
          id: 2,
          name: "Jane",
          age: 24,
          createdAt: "2020-06-02"
        },
        {
          id: 3,
          name: "Susan",
          age: 16,
          createdAt: "2020-06-02"
        },
        {
          id: 4,
          name: "Chris",
          age: 55,
          createdAt: "2020-06-2"
        },
        {
          id: 5,
          name: "Dan",
          age: 40,
          createdAt: "2020-06-02"
        },
        {
          id: 6,
          name: "John",
          age: 20,
          createdAt: "2020-06-02"
        }
      ]
    };
  },
  methods: {
      teste(){
          console.log('Active modal');
      }
  }
};
</script>