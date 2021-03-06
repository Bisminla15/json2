<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Json2</title>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>
<body>
<button id="btnBack"> back </button>
<div id="main">
    <table>
        <thead>
            <tr>
                <th> ID </th><th> Title </th><th> Details </th>
            </tr>
        </thead>
        <tbody id="tblPosts">
        </tbody>
    </table>
</div>
<div id="detail">
    <table>
        <thead>
            <tr>
                <th> ID </th><th> Title </th><th> userId </th>
            </tr>
        </thead>
        <tbody id="tblDetails">
        </tbody>
    </table> 
</div>
<div id="main2">
    <table>
        <thead>
            <th>postID</th><br/>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>body</th>
        </thead>
        <tbody id="tblPost2">
        </tbody>
    </table>
</div>
<button id="btnComments"> comment </button>
<div id="comment">
    <table>
        <thead>
            <tr>
                <th> postId </th>
                <th> ID </th>
                <th> name </th>
                <th> email </th>
                <th> body </th>
            </tr>
        </thead>
        <thead id="tblComments">
        </thead>
    </table>
</div>
</body>
<script>
    function showDetails(id){
        $("#main").hide();
        $("#detail").show();
        $("main2").hide();
        var url = "https://jsonplaceholder.typicode.com/posts/"+id;
        $.getJSON(url)
            .done((data)=>{
                console.log(data);
                var line = "<tr id='rowdetail'>";
                        line += "<td>"+ data.id + "</td>";
                        line += "<td><b>"+ data.title + "</b><br/>";
                        line += data.body + "</td>";
                        line += "<td>" + data.userId + "</td>"
                        line += "</tr>";
                    $("#tblDetails").append(line);
            })
            .fail((xhr, status, error)=>{

            })
    }
    function loadPosts(){
        $("#main").show();
        $("#detail").hide();
        $("main2").hide();
        var url = "https://jsonplaceholder.typicode.com/posts";
        $.getJSON(url)
            .done((data)=>{
                $.each(data, (k, item)=>{
                    
                    var line = "<tr>";
                        line += "<td>"+ item.id + "</td>";
                        line += "<td><b>"+ item.title + "</b><br/>";
                        line += item.body + "</td>";
                        line += "<td> <button onClick='showDetails("+ item.id +");' > link </button> </td>";
                        line += "</tr>";
                    $("#tblPosts").append(line);
                });
                $("#main").show();
            })
            .fail((xhr, status, error)=>{

            })
    }
    function loadPosts2(){
        $("#main").show();
        $("#detail").hide();
        $("#comment").hide();
        $("main2").hide();
        var url = "https://jsonplaceholder.typicode.com/comments";
        $.getJSON(url)
            .done((data)=>{
                $.each(data, (k, item)=>{
                    var line = "<tr>";
                        line += "<td>" + item.postId + "</td>"
                        line += "<td><b>" + item.id + "</b><br/>"
                        line += "<td><b>" + item.name+ "</b><br/>"
                        line += "<td><b>" + item.email + "</b><br/>"
                        line +=  item.body+ "</td>"
                        line += "</tr>";
                    $("#tblPosts2").append(line);
                });
                $("#main").show();
            })
            .fail((xhr, status, error)=>{

            })
    }
    function showComments(){
        $("#main").hide();
        $("#detail").show();
        $("#comment").show();
        var url = "https://jsonplaceholder.typicode.com/posts/comments"+id;
        $.getJSON(url)
            .done((data)=>{
                console.log(data);
                var line = "<tr id='comment'>";
                        line += "<td>"+ data.postId + "</td>";
                        line += "<td><b>" + data.id + "</b><br/>"
                        line += "<td><b>" + data.name + "</b><br/>"
                        line += "<td><b>" + data.email + "</b><br/>"
                        line += "<td><b>" + data.body + "</b><br/>"
                        line += "</tr>";
                    $("#tblComments").append(line);           
            })
            .fail((xhr, status, error)=>{

            })
    }
    
    $(()=>{
        loadPosts();
        $("#btnBack").click(()=>{
            $("#main").show();
            $("#detail").hide();
            $("#rowdetail").remove();
        });
        loadPosts2();
        $("#btnComment").click(()=>{
            $("#main").show();
            $("#main2").show();
            $("#detail").hide();
            $("#Comment").hide();   
        });
    })
</script>
</html>
