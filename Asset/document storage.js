function validateDocForm() {
  let title = document.getElementById("docTitle").value.trim();
  let file = document.getElementById("docFile").files[0];
  let permission = document.getElementById("permission").value;
  let signatureName = document.getElementById("signatureName").value.trim();
  let retentionDate = document.getElementById("retentionDate").value;
  let error = document.getElementById("errorDoc");

  error.innerHTML = "";

  if (!title) {
    error.innerHTML = "Please enter the document title.";
    return;
  }

  if (!file) {
    error.innerHTML = "Please select a document file to upload.";
    return;
  }

  if (!permission) {
    error.innerHTML = "Please select an access permission.";
    return;
  }

  if (!signatureName) {
    error.innerHTML = "Please provide your electronic signature.";
    return;
  }

  if (!retentionDate) {
    error.innerHTML = "Please specify a retention end date.";
    return;
  }

  alert("Document uploaded successfully!");
}
