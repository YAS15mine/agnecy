const setError = (element, message) => {
  const inputControl = element.parentElement;
  const errorDisplay = inputControl.querySelector(".error");
  errorDisplay.innerText = message;
  inputControl.classList.add("error");
  inputControl.classList.remove("success");
};
// ============================ set Success function ================================================== //
const setSuccess = (element) => {
  const inputControl = element.parentElement;
  const errorDisplay = inputControl.querySelector(".error");
  errorDisplay.innerText = "";
  inputControl.classList.add("success");
  inputControl.classList.remove("error");
};
form.addEventListener("submit", (e) => {
  e.preventDefault();
  validateInputs();
});
//======================= REGEX FORMS =============================//
let myRegex = /^[a-zA-Z-\s]+$/;
let AddRe = /^[#.0-9a-zA-Z\s,-]+$/;
let DescRe = /^[#.0-9a-zA-Z\s,-]+$/;
let PriceRe = /\d{1,3}/;
let SpaceRe = /\d{1,3}/;
let DateRe = /(0?[1-9]|[12]\d|30|31)/;



let arr = [];

// ================================== onclick function =============================================== //


function validateInputs(){
  const form = document.getElementById("form");
  const Tittle = document.getElementById("Tittle");
  const Price = document.getElementById("Price");
  const Space = document.getElementById("Space");
  const Location = document.getElementById("Location");
  const Description = document.getElementById("Description");
  const Date = document.getElementById("Date");
  const Image = document.getElementById("Image");
  // ======================= variables Values  ======================//
  const TittleValue = Tittle.value.trim();
  const PriceValue = Price.value.trim();
  const SpaceValue = Space.value.trim();
  const LocationValue = Location.value.trim();
  const DescriptionValue = Description.value.trim();
  const DateValue = Date.value.trim();
  const ImageValue = Image.value.trim();
//======================= validaton ====================//
  if (TittleValue === "") {
    setError(Tittle, "Tittle is required");
    arr.push(false)
  } else if (myRegex.test(TittleValue) === false) {
    setError(Tittle, "");
    arr.push(false)

  } else {
    setSuccess(Tittle);
  }

  //======================= validaton ====================//
  if (LocationValue === "") {
    setError(Location, "Location is required");
    arr.push(false)
  }  else if (AddRe.test(LocationValue) === false) {
    setError(Location, "");
    arr.push(false)

  } else {
    setSuccess(Location);
  }
    //======================= validaton ====================//
    if (DescriptionValue === "") {
      setError(Description, "Description is required");
      arr.push(false)
    }  else if (DescRe.test(DescriptionValue) === false) {
      setError(Description, "");
      arr.push(false)
  
    } else {
      setSuccess(Description);
    }
  //======================= validaton ====================//
  if (DateValue === "") {
    setError(Date, "Date is required");
    arr.push(false)
  } else if (DateRe.test(DateValue) === false) {
    setError(Date, "");
    arr.push(false)

  } else {
    setSuccess(Date);
  }
  // ============================= Date Validation ==============================//
  if (ImageValue === "") {

    setError(Image, "Image Required");
    arr.push(false)
  } else if (PriceRe.test(ImageValue) === false) {
    setError(Image, "");
    arr.push(false)
  } else {
    setSuccess(Image);
  }
  //======================= Price Validation =============================//
  if (PriceValue === "") {
    setError(Price, "Price is required");
    arr.push(false)
  } else if (PriceValue.length > 14) {
    setError(Price, "Price is too long");
    arr.push(false)
  } else if (PriceRe.test(PriceValue) === false) {
    setError(Price, "Price is invalid");
    arr.push(false)
  } else {
    setSuccess(Price);
  }
  //======================= Price Validation =============================//
  if (SpaceValue === "") {
    setError(Space, "Space is required ");
    arr.push(false)
  } else if (SpaceRe.test(SpaceValue) === false) {
    setError(Space, "Space is invalid");
    arr.push(false)
  } else {
    setSuccess(Space);
  }

  
  if (arr.length === 0) {
    form.submit();
  }


};