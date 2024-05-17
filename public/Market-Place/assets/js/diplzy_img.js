const image_input = document.querySelector("#image-input");

image_input.addEventListener("change", function() {
  const reader = new FileReader();
  reader.addEventListener("load", () => {
    const uploaded_image = reader.result;
    document.querySelector("#display-image").style.backgroundImage = `url(${uploaded_image})`;
    document.querySelector("#display-image img").style.display = `none`;

  });
  reader.readAsDataURL(this.files[0]);
});

















const image_input1 = document.querySelector("#image-input1");

image_input1.addEventListener("change", function() {
  const reader = new FileReader();
  reader.addEventListener("load", () => {
    const uploaded_image1 = reader.result;
    document.querySelector("#display-image1").style.backgroundImage = `url(${uploaded_image1})`;
    document.querySelector("#display-image1 img").style.display = `none`;

  });
  reader.readAsDataURL(this.files[0]);
});

