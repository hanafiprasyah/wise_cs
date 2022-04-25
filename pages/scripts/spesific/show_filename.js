$("#inputGroupFile01").on("change", function () {
  // Ambil nama file
  let fileName = $(this).val().split("\\").pop();
  // Ubah "Choose a file" label sesuai dengan nama file yag akan diupload
  $(this).next(".custom-file-label").addClass("selected").html(fileName);
});
