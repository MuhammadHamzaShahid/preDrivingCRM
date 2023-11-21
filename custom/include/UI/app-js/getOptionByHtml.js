function getOptionHTML(optionArray, selectedField, selectedVal) {
  var optionHTML = "";
  for (key in optionArray) {
    if (selectedVal == key)
      optionHTML +=
        '<option selected value="' +
        key +
        '">' +
        optionArray[key] +
        "</option>";
    else
      optionHTML +=
        '<option value="' + key + '">' + optionArray[key] + "</option>";
  }
  jq331("#" + selectedField)
    .html(optionHTML)
    // .select2({ allowClear: true });
  //     var $theSelect = $('#'+selectedField);
  //     $theSelect.select2({ allowClear: true });
}
function getOptionHTMLByVar(flag, selectedField, selectedVal, disFlag = "") {
  var data = JSON.parse(localStorage.getItem("buyersData"));

  var optionHTML = '<option value="-1" disabled selected>Select</option>';
  if (disFlag == "f_enable")
    var optionHTML = '<option value="" >Select</option>';

  if (flag == "allBuyers") {
    for (key in allBuyers) {
      if (selectedVal == allBuyers[key]["0"])
        optionHTML +=
          '<option selected value="' +
          allBuyers[key]["0"] +
          '">' +
          allBuyers[key]["1"] +
          "</option>";
      else
        optionHTML +=
          '<option value="' +
          allBuyers[key]["0"] +
          '">' +
          allBuyers[key]["1"] +
          "</option>";
    }
    $("#" + selectedField).html(optionHTML);
  }
}