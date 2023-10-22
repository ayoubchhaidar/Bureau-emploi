const jobSearch = document.querySelector(".flex");


jobSearch.addEventListener("input", (e) => {

  searchTerm = e.target.value; console.log(searchTerm);
  let jobs =document.querySelectorAll(".jobcard");
  jobs.forEach(job => {
    if (searchTerm === '') {
      jobs.forEach(job1 => {  job1.style.display = 'flex';});




    } else if (job.querySelector(".job1 h3").textContent.trim().toLowerCase().includes(searchTerm)) {
      job.style.display = 'flex';
      

    } else {
      job.style.display = 'none';
    }
  });
  
});