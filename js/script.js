
$("#delete").click(function () {
    const checked = $("input[type=radio]:checked");
    request = $.ajax({
      url: "delete.php",
      type: "post",
      data: { id: checked.val() },
    });
    request.done(function (response, textStatus, jqXHR) {
      if (response === "Success") {
        checked.closest("tr").remove();
      } else {
        console.log("Stavka nije obrisana " + response);
        alert("Stavka nije obrisana");
      }
    });
  });



function updateUserName(id, name) {
    $.ajax({
        url: "updateUser.php",
        type: "POST",
        data: {id: id, name: name},
        success: function(response) {
           alert("Username je uspešno izmenjen!");
        },
        error: function(xhr, status, error) {
            console.error(xhr);
        }
    });
}

function updateUserPass(id, pass) {
    
    $.ajax({
        url: "updateUser.php",
        type: "POST",
        data: {id: id, pass: pass},
        success: function(response) {
            location.reload();
           alert("Lozinka je uspešno izmenjena!");
        },
        error: function(xhr, status, error) {
            console.error(xhr);
        }
    });
}

function updateUserEmail(id, email) {
    
    $.ajax({
        url: "updateUser.php",
        type: "POST",
        data: {id: id, email: email},
        success: function(response) {
            location.reload();
           alert("Email je uspešno izmenjen!");
        },
        error: function(xhr, status, error) {
            console.error(xhr);
        }
    });
}


function sortTableByDate() {
    var table = document.getElementById("table");
    var rows = table.rows;
    var switching = true;
  
    while (switching) {
      switching = false;
      for (var i = 1; i < rows.length - 1; i++) {
        var row1 = rows[i].getElementsByTagName("td")[2];
        var row2 = rows[i + 1].getElementsByTagName("td")[2];
        if (new Date(row1.innerHTML) > new Date(row2.innerHTML)) {
          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
        }
      }
    }
  }


  function search() {

    var input, filter, table, tr, i, td1, td2, txtValue1, txtValue2;
    input = document.getElementById("input");
    filter = input.value.toUpperCase();
    table = document.getElementById("table");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td1 = tr[i].getElementsByTagName("td")[0];
        td2 = tr[i].getElementsByTagName("td")[1];
        

        if (td1 || td2  ) {
            txtValue1 = td1.textContent || td1.innerText;
            txtValue2 = td2.textContent || td2.innerText;

            if (txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
  