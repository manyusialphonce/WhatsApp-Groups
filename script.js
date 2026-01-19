document.getElementById("groupForm").addEventListener("submit", function(e){
  e.preventDefault(); // 🔥 HII NDIO MUHIMU (INAUA 405)

  const group = document.getElementById("group").value;
  const user = document.getElementById("user").value;
  const phone = document.getElementById("phone").value;

  if(group && user && phone){
    document.getElementById("msg").innerText = "Saved successfully!";
    this.reset();
  }
});