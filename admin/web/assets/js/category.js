

function btnToggle(id) {
    var btnSaveId = "#btn-save-" + id;
    var inputClass = ".input-" + id;
    var btnEditId = "#btn-edit-" + id;
    var btnCancelId = "#btn-cancel-" + id;
    $(function () {
      $(btnSaveId).toggle();
      $(inputClass).prop("disabled", (i, v) => !v);
      $(btnEditId).toggle();
      $(btnCancelId).toggle();
    });
  }
  
  function save(id) {
    var nameId = "#name-input-" + id;
    var descriptionId = "#description-input-" + id;
    var categoryId = id;
    var categoryName = $(nameId).val();
    var categoryDescription = $(descriptionId).val();
    var isValid = Boolean(!(categoryName === null || categoryName.trim() === "") &&  !(categoryDescription === null || categoryDescription.trim() === ""));
      $(function () {
          if (isValid) {
                  // update record
                $.ajax({
                  url: "category.php?action=update",
                  type: "post",
                  data: {
                    update: 1,
                    id: categoryId,
                    name: categoryName,
                    description: categoryDescription,
                  },
                  success: function (jsonResponse) {
                    var respond = JSON.parse(jsonResponse)
                      $("#respond-msg").text(respond["message"]).fadeIn('slow', function () {
                          $(this).delay(2500).fadeOut('slow');
                        });
                  }
                });        
            }
      });
    btnToggle(id);
  }
  

  function addCategory(id) {
    var nameId = "#name-input-" + id;
    var descriptionId = "#description-input-" + id;
    var btnCancelId = "#btn-cancel-" + id;
    var btnSaveId = "#btn-save-" + id;

    var categoryId = id;
    var categoryName = $(nameId).val();
    var categoryDescription = $(descriptionId).val();

    var isValid = Boolean(!(categoryName === null || categoryName.trim() === "") &&  !(categoryDescription === null || categoryDescription.trim() === ""));
      $(function () {
          if (isValid) {
                $.ajax({
                  url: "category.php?action=add",
                  type: "post",
                  data: {
                    add: 1,
                    id: categoryId, 
                    name: categoryName,
                    description: categoryDescription,
                  },
                  success: function (jsonResponse) {
                    var respond = JSON.parse(jsonResponse)
                    if (respond["status"] === "success") {
                        $(btnSaveId).attr("onclick", 'save(\''+id+'\')');

                    }
                    if (respond["status"] === "fail") {
                             // todo: Closure  deleteRow(id) in a function
                   var rowId = "#tr-" + id;
                   $(rowId).fadeOut(300, function () {
                     $(this).remove();
                   });
                    }
                      $("#respond-msg").text(respond["message"]).fadeIn('slow', function () {
                          $(this).delay(2500).fadeOut('slow');
                        });                       
                  }
                });
                $(btnCancelId).toggle();
            }else {                
              deleteRow(id);
              prompMsg("Empty field cannot be save.");
            }
      });
    btnToggle(id);
  }
  
  function deleteCategory(id) {
      var categoryId = id;
      $(function () { 
          $.ajax({
              url: "category.php?action=delete",
              type: "post",
              data: {
                  delete: 1,
                id: categoryId
              },
              success: function (jsonResponse) {
                var respond = JSON.parse(jsonResponse)
                if (respond["status"] === "success") {
                    deleteRow(id)
                }
                  $("#respond-msg").text(respond["message"]).fadeIn('slow', function () {
                      $(this).delay(2500).fadeOut('slow');
                    });         
              }
            });    
       });
  }
  
  function deleteRow(id){
      $(function () {
          var rowId = "#tr-" + id;
          $(rowId).fadeOut(300, function () {
            $(this).remove();
          });
        });
  }
  
  function addRow() {
    var index = $("#category-table tr").length;
    var newId = createUUID();
  
    $("#category-table > tbody:last-child").append(
      '<tr id="tr-' +
        newId +
        '">\n' +
        "<td>\n" +
        index +
        "</td>\n" +
        '<td> <input class="col-md-12 input-' +
        newId +
        '" id="name-input-' +
        newId +
        '" type="text" value=""></td>\n' +
        "<td>\n" +
        '<input class="col-md-12 input-' +
        newId +
        '" id="description-input-' +
        newId +
        '" type="text" value="">\n' +
        "</td>\n" +
        '<td class="td-actions text-right">\n' +
        '<button type="button" title="Save" class="btn btn-success btn-link btn-sm" id="btn-save-' +
        newId +
        '" onclick="addCategory(\'' +
        newId +
        "')\">\n" +
        ' <i class="material-icons">save</i>\n' +
        " </button>\n" +
        '<button type="button" title="Cancel" class="btn btn-danger btn-link btn-sm" id="btn-cancel-' +
        newId +
        '"style="display: none;" onclick="btnToggle(\'' +
        newId +
        "')\">\n" +
        '  <i class="material-icons">cancel</i>\n' +
        "  </button>\n" +
        '  <button type="button" title="Edit" class="btn btn-primary btn-link btn-sm" id="btn-edit-' +
        newId +
        '" style="display: none;" onclick="btnToggle(\'' +
        newId +
        "')\">\n" +
        '  <i class="material-icons">edit</i>\n' +
        " </button>\n" +
        '  <button type="button" title="Delete" class="btn btn-danger btn-link btn-sm" onclick="deleteCategory(\'' +
        newId +
        "')\">\n" +
        '   <i class="material-icons">close</i>\n' +
        "  </button>\n" +
        "  </td>\n" +
        " </tr>"
    );
  }
  
  
  function createUUID() {
      return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
         var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
         return v.toString(16);
      });
   }
  function prompMsg(msg){
      $(function () {  
          $("#respond-msg").text(response).fadeIn('slow', function () {
              $(this).delay(5000).fadeOut('slow');
            });
      });
  
  }
  