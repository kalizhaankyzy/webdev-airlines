let cityies =["Atlanta",
            "Auckland",
            "Barselona",
            "Bali",
            "Sao-Paulo",
            "Helsinki",
            "Paris",
            "Montreal",
            "Hydrabad",];

            let sortedNames = cityies.sort();
            //reference
            let input = document.getElementById("input");
              input.addEventListener("keyup", (e) => {
                //loop through above array
                //Initially remove all elements ( so if user erases a letter or adds new letter then clean previous outputs)
                removeElements();
                for (let i of sortedNames) {
                  //convert input to lowercase and compare with each string
                  if (
                    i.toLowerCase().startsWith(input.value.toLowerCase()) &&
                    input.value != ""
                  ) {
                    //create li element
                    let listItem = document.createElement("li");
                    //One common class name
                    listItem.classList.add("list-items");
                    listItem.style.cursor = "pointer";
                    listItem.setAttribute("onclick", "displayNames('" + i + "')");
                    //Display matched part in bold
                    let word = "<b>" + i.substr(0, input.value.length) + "</b>";
                    word += i.substr(input.value.length);
                    //display the value in array
                    listItem.innerHTML = word;
                    
                    document.querySelector(".list").appendChild(listItem);
                  }
                }
              });
              function displayNames(value) {
                input.value = value;
                removeElements();
              }
              function removeElements() {
                //clear all the item
                let items = document.querySelectorAll(".list-items");
                items.forEach((item) => {
                  item.remove();
                });
              }
            
            //Execute function on keyup
            let input1 = document.getElementById("input-1");
              input1.addEventListener("keyup", (e) => {
                //loop through above array
                //Initially remove all elements ( so if user erases a letter or adds new letter then clean previous outputs)
                removeElements1();
                for (let i of sortedNames) {
                  //convert input to lowercase and compare with each string
                  if (
                    i.toLowerCase().startsWith(input1.value.toLowerCase()) &&
                    input1.value != ""
                  ) {
                    //create li element
                    let listItem = document.createElement("li");
                    //One common class name
                    listItem.classList.add("list-items1");
                    listItem.style.cursor = "pointer";
                    listItem.setAttribute("onclick", "displayNames1('" + i + "')");
                    //Display matched part in bold
                    let word = "<b>" + i.substr(0, input1.value.length) + "</b>";
                    word += i.substr(input1.value.length);
                    //display the value in array
                    listItem.innerHTML = word;
                    document.querySelector(".list1").appendChild(listItem);
                  }
                }
              });
              function displayNames1(value) {
                input1.value = value;
                removeElements1();
              }
              function removeElements1() {
                //clear all the item
                let items = document.querySelectorAll(".list-items1");
                items.forEach((item) => {
                  item.remove();
                });
              }
            