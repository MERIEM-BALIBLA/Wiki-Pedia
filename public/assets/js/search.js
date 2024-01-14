document.getElementById("search").addEventListener("input", function () {
  var search = document.getElementById("search").value;

  var x = new XMLHttpRequest();
  x.open("GET", "Search?search=" + search, true);
  x.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      var res = JSON.parse(this.response);
      console.log(res);

      var parent = document.getElementById("parent");
      parent.innerHTML = "";

      res.forEach(e => {
        var div = document.createElement("div");
        div.className = "flex flex-col gap-8 justify-center items-center rounded-[18px] drop-shadow-[0px_2px_28px_0px_#3E35780A] shadow-[0px_2px_28px_0px_#3E35780A] bg-white dark:bg-cardGrey p-8 w-[329px]";

        div.innerHTML = `
          <div >
            <h3 class="dark:text-slate-50 text-defaultText font-poppins font-semibold text-xl">${e.name}</h3>
            `;
        parent.appendChild(div);
      });
    } else {
      var parent = document.getElementById("parent");
      parent.innerHTML = "";
    }
  };
  x.send();
});
  
// // categories 
// document.getElementById("cat").addEventListener("input", function () {
//   var search = document.getElementById("cat").value;

//   var x = new XMLHttpRequest();
//   // x.open("GET", "message.php?search=" + search, true);
//   x.open("GET", "message.php?cat=" + search, true);
//   x.onreadystatechange = function () {
//     if (this.readyState === 4 && this.status === 200) {
//       var res = JSON.parse(this.response);
//       console.log(res);

//       var parent = document.getElementById("parent");
//       parent.innerHTML = "";

//       res.forEach(e => {
//         var div = document.createElement("div");
//         div.className = "flex flex-col gap-8 justify-center items-center rounded-[18px] drop-shadow-[0px_2px_28px_0px_#3E35780A] shadow-[0px_2px_28px_0px_#3E35780A] bg-white dark:bg-cardGrey p-8 w-[329px]";

//         div.innerHTML = `
//           <div class="flex justify-center items-center flex-col">
//             <img src="../images/job-logo-1.png.svg" alt="first-job-logo"> 
//             <h3 class="dark:text-slate-50 text-defaultText font-poppins font-semibold text-xl">${e.Project_title}</h3>
//             <p class="text-mainBlue dark:text-mainPurple font-poppins font-normal text-base">${e.Descriptions}</p>
//           </div>
//           <a class="btn btn-primary" href="projectInfo.php?Project_ID=${e.Project_ID}"><button>Im a simple link</button><a>`;
//         parent.appendChild(div);
//       });
//     } else {
//       var parent = document.getElementById("parent");
//       parent.innerHTML = "";
//     }
//   };
//   x.send();
// });