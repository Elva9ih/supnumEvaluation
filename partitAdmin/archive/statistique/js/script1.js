function tableToExcel(){
    document.getElementById("table").style.display = "inline";
    var table2excel = new Table2Excel();
      table2excel.export(document.querySelectorAll("table.table"));
      document.getElementById("table").style.display = "none";
            
    }