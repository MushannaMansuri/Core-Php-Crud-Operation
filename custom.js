$(document).ready(function () {
  // loadDate()
  //------------------------Insert-----------------------------------------//
  $("#add-form").on("submit", function (e) {
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
      url: "insert.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        // console.log(response);
        response = JSON.parse(response);
        if (response.success) {
          $("#add-form")[0].reset();

          $("#alert-message").html(
            '<div class="alert alert-success" role="alert">' +
              response.message +
              "</div>"
          );
          console.log($(".show"));
          setTimeout(function () {
            $(".show").remove();
            loadDate();
            // location.href = "index.php";
          }, 3000);
        } else {
          $("#alert-message").html(
            '<div class="alert alert-danger" role="alert">' +
              response.message +
              "</div>"
          );
          // setTimeout(function () { location.href = "#addModal" }, 1000);
        }
      },
    });
  });

  //-------------------------Delete-------------------------------------//
  $(".delete-button").on("click", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var $rowDelete = $(this).closest("tr");

    $.ajax({
      url: "delete.php",
      type: "GET",
      data: { id: id },

      success: function (response) {
        console.log(response);
        if (response.success) {
          loadDate();
          $rowDelete.remove();
          $("#alert-message-dlt").html(
            '<div class="alert alert-success" role="alert">' +
              response.message +
              "</div>"
          );
          setTimeout(function () {
            $("#alert-message-dlt").remove();
            // location.href = "index.php";
          }, 2000);
        } else {
          $("#alert-message-dlt").html(
            '<div class="alert alert-danger" role="alert">' +
              response.message +
              "</div>"
          );
        } 
      },
      error: function () {
        console.log("Error");
      },
    });
  });

  //---------------------------Update-------------------------------------//
  $("#update-form").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      url: "update.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        response = JSON.parse(response);
        if (response.success) {
          loadDate();
          $("#alert-messageupdate").html(
            '<div class="alert alert-success" role="alert">' +
              response.message +
              "</div>"
          );

          setTimeout(function () {
            location.href = "index.php";
          }, 3000);
        } else {
          $("#alert-messageupdate").html(
            '<div class="alert alert-danger" role="alert">' +
              response.message +
              "</div>"
          );
          // setTimeout(function () { location.href = "#addModal" }, 1000);
        }
      },
    });
  });

  //---------------------------Update-------------------------------------//
  function loadDate() {
    $.ajax({
      url: "demo.php",
      type: "POST",
      dataType: "json", // Specify the expected data type
      success: function (response) {
        console.log("response :", response);
        if (response && response.success) {
          var itemsHtml = response.data
            .map(function (item, i) {
              return `<tr>
              <td>${i + 1}</td>
              <td>${item.name}</td>
              <td>${item.email}</td>
              <td>${item.gender}</td>
              <td>${item.location}</td>
              <td>${item.checkbox}</td>
              <td>
                  <button type="button" data-id="${id}" class="btn btn-outline-danger edit-button">
                      <img src="img/editicon.png" style="width: 18px;">
                  </button>
                  <button type="button" onclick="deleteUser(${i})" class="btn btn-outline-danger delete-button">
                      <img src="img/dlticon.png" style="width: 18px;">
                  </button>
              </td>
          </tr>`;
            })
            .join("");
          $("#yourTableBody").html(itemsHtml);
        }
      },
      error: function (xhr, status, error) {
        console.log("Error:", status, error);
        console.log("Response Text:", xhr.responseText);
      },
    });
  }

  function deleteUser(index) {
    // Your delete logic here, using the index parameter
    console.log('Delete user at index:', index);
}
});
