const URL_API =
  "https://cors-anywhere.herokuapp.com/https://custom-cwxn.frb.io/query";

const MEMBERS_IMGS = {
  annDruyan: "./assets/ann_druyan.jpg",
  carlSagan: "./assets/carl_sagan.jpg",
  ewardCStone: "./assets/eward_c_stone.jpg",
  frankDrake: "./assets/frank_drake.jpg",
  jonLomberg: "./assets/jon_lomberg.jpg",
};

const LOADING_SPINNER = "./assets/oval.svg";

const $inputs = document.querySelectorAll(".inputs");
const $textPreviews = document.querySelectorAll(".previews");
const $imagePreview = document.querySelector("#img-preview");
const $pageControl = document.querySelector("#page-control");
const $formPolaroids = document.querySelector("#form-polaroids");

let page = "the-journey"; // set initial page

function getData(param) {
  return fetch(`${URL_API}/${param}`, {
    method: "GET",
  })
    .then((response) => response.json())
    .then((data) => {
      return data;
    })
    .catch((e) => {
      alert(`Can't fetch data, Error: ${e}`);
    });
}

function resetData() {
  $imagePreview.src = "";

  $textPreviews.forEach(($text) => {
    $text.innerHTML = "";
  });
}

function showData(data) {
  let { imgSrc, title, text_1, text_2 } = data;
  $imagePreview.src = imgSrc;
  $textPreviews[0].value = title;
  $textPreviews[1].value = text_1;
  $textPreviews[2].value = text_2;
}

function showLoadingWithImage() {
  $imagePreview.src = LOADING_SPINNER;
  $textPreviews[0].value = "...";
  $textPreviews[1].value = "...";
  $textPreviews[2].value = "...";
}

function showLoadingWithoutImage() {
  $imagePreview.src = "";
  $textPreviews[0].value = "...";
  $textPreviews[1].value = "...";
  $textPreviews[2].value = "...";
}

$inputs.forEach((input, i) => {
  input.addEventListener("input", (e) => {
    $textPreviews[i].value = e.target.value;
  });
});

$pageControl.addEventListener("change", (e) => {
  page = e.target.value;
  $formPolaroids.classList.remove("d-block");
  if (page === "polaroids") {
    $formPolaroids.classList.add("d-block");
  }
});

$formPolaroids.addEventListener("change", async (e) => {
  resetData();
  let v = e.target.value;
  if (v !== "") {
    showLoadingWithImage();
    getData("polaroids").then((rawData) => {
      console.log(rawData);
      let data = rawData.filter((member) => member.name === v);
      let { name, title, text_1, text_2 } = data[0];
      console.log(MEMBERS_IMGS[name]);

      console.log(v, name);
      showData({
        imgSrc: MEMBERS_IMGS[name],
        title,
        text_1,
        text_2,
      });
    });
  }
});
