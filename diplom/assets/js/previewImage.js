const image = document.querySelector(".preview");
const input = document.querySelector(".input-image");

function previewFile() {
  const reader = new FileReader();
  const file = input.files[0];

  reader.onloadend = function () {
    image.src = reader.result;
  };

  if (file) {
    reader.readAsDataURL(file);
  } else {
    image.src = "";
  }
}
