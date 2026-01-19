document.getElementById("techForm").addEventListener("submit", function(e){
  e.preventDefault();

  const data = {
    name: document.getElementById("name").value,
    phone: document.getElementById("phone").value,
    group: document.getElementById("group").value
  };

  let saved = JSON.parse(localStorage.getItem("contacts")) || [];
  saved.push(data);
  localStorage.setItem("contacts", JSON.stringify(saved));

  document.getElementById("msg").innerText = "Saved successfully!";
  this.reset();
});