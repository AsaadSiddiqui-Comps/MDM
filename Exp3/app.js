console.log("Hello form javaScript");
function addTask() {
      const input = document.getElementById("taskInput");
      const text = input.value.trim();
      if (text === "") return;

      const li = document.createElement("li");
      const span = document.createElement("span");
      span.textContent = text;

      const btns = document.createElement("div");
      btns.className = "task-btns";

      const checkBtn = document.createElement("button");
      checkBtn.className = "check-btn";
      checkBtn.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M20.29 5.71a1 1 0 00-1.42 0L9 15.59l-3.29-3.3a1 1 0 00-1.42 1.42l4 4a1 1 0 001.42 0l11-11a1 1 0 000-1.42z"/>
        </svg>
      `;
      checkBtn.onclick = () => {
        li.classList.toggle("done");
      };

      const removeBtn = document.createElement("button");
      removeBtn.className = "remove-btn";
      removeBtn.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M18.36 6.64a1 1 0 00-1.41 0L12 11.59 7.05 6.64A1 1 0 105.64 8.05L10.59 13l-4.95 4.95a1 1 0 101.41 1.41L12 14.41l4.95 4.95a1 1 0 001.41-1.41L13.41 13l4.95-4.95a1 1 0 000-1.41z"/>
        </svg>
      `;
      removeBtn.onclick = () => li.remove();

      btns.appendChild(checkBtn);
      btns.appendChild(removeBtn);

      li.appendChild(span);
      li.appendChild(btns);

      document.getElementById("taskList").appendChild(li);
      input.value = "";
    }