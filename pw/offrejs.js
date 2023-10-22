


const jobsContainer = document.querySelector(".jobs-list-container .jobs");
const jobSearch = document.querySelector(".jobs-list-container .job-search");

let searchTerm = "";






const ajobsContainer = document.querySelector(".jobs-container");


jobSearch.addEventListener("input", (e) => {
  searchTerm = e.target.value; console.log(searchTerm);
  let jobs =document.querySelectorAll(".job");
  jobs.forEach(job => {
    if (searchTerm === '') {
      jobs.forEach(job1 => {  job1.style.display = 'flex';});




    } else if ((job.querySelectorAll('h3')[1].textContent).includes(searchTerm)) {
      job.style.display = 'flex';
      

    } else {
     
      job.style.display = 'none';
    }
  });
  
});
