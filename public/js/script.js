const URL_API =
  "https://custom-pcvp.frb.io/query";

const MEMBERS_IMGS = {
  annDruyan: "./assets/ann_druyan.jpg",
  carlSagan: "./assets/carl_sagan.jpg",
  ewardCStone: "./assets/eward_c_stone.jpg",
  frankDrake: "./assets/frank_drake.jpg",
  jonLomberg: "./assets/jon_lomberg.jpg",
};

const SIGNS_SVGS = {
  waves: "./assets/waves.svg",
  record: "./assets/record.svg",
  pulsar: "./assets/pulsar.svg",
  hydrogen: "./assets/hydrogen.svg",
  frames: "./assets/frames.svg",
  elevation: "./assets/elevation.svg",
};

const LOADING_SPINNER = "./assets/oval.svg";

const $inputs = document.querySelectorAll(".inputs");
const $textPreviews = document.querySelectorAll(".previews");
const $imagePreview = document.querySelector("#img-preview");
const $pageControl = document.querySelector("#page-control");
const $formPolaroids = document.querySelector("#form-polaroids");
const $formRecord = document.querySelector("#form-record");
const $form = document.querySelector("#form");
const $submitButton = document.querySelector("#submit");
const $id = document.querySelector("#id");

console.log($formRecord);

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
  $imagePreview.style.backgroundColor = "#6c757d";
  $formRecord.classList.remove("d-block");
  $formPolaroids.classList.remove("d-block");

  if (page === "polaroids") {
    $submitButton.setAttribute("name", "polaroids");
    $formPolaroids.classList.add("d-block");
  } else if (page === "record") {
    $submitButton.setAttribute("name", "record");
    $formRecord.classList.add("d-block");
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
      let { name, title, text_1, text_2, id } = data[0];
      $id.value = id;
      showData({
        imgSrc: MEMBERS_IMGS[name],
        title,
        text_1,
        text_2,
      });
    });
  }
});

$formRecord.addEventListener("change", async (e) => {
  resetData();
  let v = e.target.value;
  if (v !== "") {
    showLoadingWithImage();
    getData("how_use").then((rawData) => {
      console.log(rawData);
      let data = rawData.filter((sign) => sign.symbol === v);
      let { id, symbol, title, text_1, text_2 } = data[0];
      $id.value = id;
      showData({
        imgSrc: SIGNS_SVGS[symbol],
        title,
        text_1,
        text_2,
      });
    });
  }
});
