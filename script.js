



$(document).ready(function () {

  $("#parent").select2();

  $(".nav-link").addClass("active");

  $("#addnode").on("submit", function () {
    $(".btnsubmit").hide();
  });

  $('#example').DataTable({

    responsive: true,
    paging: false,
    searching: true,
    select: true,
    ordering: false,
    language: {
      processing: "Traitement en cours...",
      search: "Rechercher&nbsp;:",
      lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
      info: "Total: _TOTAL_ ",

    }
  });


  $.ajax({
    url: "list.php",
    success: function (trees) {
      let p = displayTrees(JSON.parse(trees));

      var res = "<ul>";
      p.forEach(NODES => {



        // we havva array in array; WE COULD HAVE MANY TREE SEPERATLY
        // NODES  FROM PARENT TO CHILD

        NODES.forEach((el, index) => {

          let c = -1;
          let count = char_count(el.node, '.');
          /*
                    for (let index = 0; index < count; index++) {
                      $("#Preview").append("<div col-"+(index+1)+">sss</div>");
                      
                    }*/

          let spaces = numberSpaces(el);

          spaces.forEach(sp => {

            $("#Preview").append("-");
          });
          $("#Preview").append(el.name + "<br>");

        });




      });




    },
    error: function (error) {
      alert(error);
    }

  });


  function displayTrees(trees) {
    var t = [];

    var o = [];
    trees.map(tree => {

      // if general category
      if (char_count(tree.node, '.') == 0) {
        if (o.length != 0) {
          t.push(o);
          o = [];
          o.push(tree);

        }
        else {

          o.push(tree);
        }

      }
      //if child category
      else {
        o.push(tree);
      }
    })

    /* add last iteration */
    t.push(o);

    return t;
  }


  function char_count(str, letter) {
    var letter_Count = 0;
    for (var position = 0; position < str.length; position++) {
      if (str.charAt(position) == letter) {
        letter_Count += 1;
      }
    }
    return letter_Count;
  }

  function numberSpaces(node) {
    var number = [];

    let spacenbr = char_count(node.node, '.') * 4;
    for (let i = 0; i < spacenbr; i++) {
        number.push("&nbsp;");
    }
    return number;
  }

/*
  var data = {
    menu: [{
      name: 'Women Cloth',
      link: '0',
      sub: [{
        name: 'Arsenal',
        link: '0-0',
        sub: null
      }, {
        name: 'Liverpool',
        link: '0-1',
        sub: [{
          name: 'Arsenal',
          link: '0-0',
          sub: null
        }, {
          name: 'xxx',
          link: '0-1',
          sub: [{
            name: 'aa',
            link: '0-0',
            sub: null
          }, {
            name: 'www',
            link: '0-1',
            sub: null
          }, {
            name: 'Manchester United',
            link: '0-2',
            sub: null
          }]
        }, {
          name: 'Manchester United',
          link: '0-2',
          sub: null
        }]
      }, {
        name: 'Manchester United',
        link: '0-2',
        sub: null
      }]
    }, {
      name: 'Men Cloth',
      link: '1',
      sub: [{
        name: 'Arsenal',
        link: '0-0',
        sub: null
      }, {
        name: 'Liverpool',
        link: '0-1',
        sub: null
      }, {
        name: 'Manchester United',
        link: '0-2',
        sub: null
      }]
    }]
  };

  var getMenuItem = function (itemData) {

    var item = $("<li>", {
      class: 'has-children',
      id: itemData.id
    }).append(
      $("<a>", {
        href: itemData.link,
        html: itemData.name,
        id: itemData.id + '-links',
      }));


    if (itemData.sub) {
      //Add UL once only
      
      sublistnode(item, itemData.sub);

 
    }
    return item;
  };


  var $menu = $("#Menu");
  $.each(data.menu, function (index, data) {
    $menu.append(getMenuItem(data));
  });


  function sublistnode(item, sub ) {
    //Add UL once only
    var subListX = $("<ul>", {
      class: 'secondakry-dropdown',
    });

    $.each(sub, function (index, data) {
      //Sub menu
      var subMenuItem = $("<li>", {
        class: 'has-icon'
      }).append(
        $("<a>", {
          href: data.link,
          html: data.name,
          class: 'submenu-title',
        }));

      if (data.sub) {
        return sublistnode(item, data.sub);
      }

      subListX.append(subMenuItem);
    });
item.append(subListX);
  }
*/
  

});



var toggler = document.getElementsByClassName("caret");
var i;

for (i = 0; i < toggler.length; i++) {
  toggler[i].addEventListener("click", function() {
    this.parentElement.querySelector(".nested").classList.toggle("active");
    this.classList.toggle("caret-down");
  });
}