

const image_input2 = document.querySelector("#image-input2");

image_input2.addEventListener("change", function() {
  const reader = new FileReader();
  reader.addEventListener("load", () => {
    const uploaded_image2 = reader.result;
    document.querySelector("#display-image2").style.backgroundImage = `url(${uploaded_image2})`;
    document.querySelector("#display-image2 img").style.display = `none`;

  });
  reader.readAsDataURL(this.files[0]);
});














const image_input3 = document.querySelector("#image-input3");

image_input3.addEventListener("change", function() {
  const reader = new FileReader();
  reader.addEventListener("load", () => {
    const uploaded_image3 = reader.result;
    document.querySelector("#display-image3").style.backgroundImage = `url(${uploaded_image3})`;
    document.querySelector("#display-image3 img").style.display = `none`;

  });
  reader.readAsDataURL(this.files[0]);
});



