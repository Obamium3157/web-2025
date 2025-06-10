console.log("1: Начало");

setTimeout(() => {
  console.log("2: setTimeout");
}, 0);

Promise.resolve().then(() => {
  console.log("3: Promise 1");
}).then(() => {
  console.log("4: Promise 2");
});

Promise.resolve().then(() => {
  console.log("5: Promise 3");
}).then(() => {
    console.log("6: Promise 4");
});

document.addEventListener("click", () => {
  console.log("5: Click Event");
});

console.log("6: Конец");