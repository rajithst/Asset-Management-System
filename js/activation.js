function activate(form, origin, target) {
    if (origin.value.length > 0) {
        document.forms[form][target].disabled = false;
    } else {
        document.forms[form][target].disabled = true;
        document.forms[form][target].value = "";
    }    
}

function exportF(elem) {
  var table = document.getElementById("table");
  var html = table.outerHTML;
  var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
  elem.setAttribute("href", url);
  elem.setAttribute("download", "export.xls"); // Choose the file name
  return false;
}