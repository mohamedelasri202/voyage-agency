<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script  src="tailwind.js" ></script>
    <script src="main.js"></script>
    <title>Document</title>

    <style>
        .some {
            -ms-overflow-style: none; /* IE and Edge */
            scrollbar-width: none;   /* Firefox */
        }
    </style>


</head>
<body class=" h-screen overflow-hidden">
<header class="h-14 bg-black bg-opacity-80 flex justify-around items-center">
        <div class="  h-full" >
           <img src="400square-legacy-removebg-preview.png" alt="" class=" h-full">
        </div>
<nav>
            <ul class="flex justify-between gap-8 text-white">
                <li> <a href="dashboord.php"> Clients</a> </li>
                <li><a href="activity.php">Activities</a> </li>
                <li> <a href="reservation.php">Reservations</a> </li>
            </ul>
            </nav>


        <div class=" flex text-white  ">
       
        <p>  <i class="fa-solid fa-user" class="rounded-[100%]" ></i> Log in </p>
        </div>
       
    </header>
    <?php 
    include ("database.php");

if (isset($_POST['Submit'])){
    $title =$_POST ['title'];
    $description =$_POST['description'];
    $destination =$_POST ['destination'];
    $price =$_POST['price'];
    $start=$_POST ['start_date'];
    $final=$_POST ['final_date'];
    $places =$_POST ['places'];

$act = "INSERT INTO activities (title, description, destination, price, start_date, final_date, places) 
    VALUES ('$title', '$description', '$destination', '$price', '$start', '$final', '$places')";

if (mysqli_query($db, $act)) {
// echo "wa3la slamtak akhoyyi";
} else {
// echo "Error: " . mysqli_error($db);
}
}


    ?>



<section class="flex relative ">
        <aside class=" bg-opacity-70 bg-black w-96 h-screen" >
            <div class="flex flex-col items-center  mt-4 gap-2"> 
              <div class=" bg-slate-500 w-80 text-center h-9 flex flex-col gap-5 justify-center "><p> <i class="fa-solid fa-bars"></i> Menu </p></div> 
            
            <div class=" bg-slate-500 bg-opacity-30 w-80 text-center flex flex-col justify-around h-64 ">
                <button >add  Clients</button >
                <button onclick="showformeact()">add  Activities</button >
                <button >add  Reservations</button >
            </div>

            <div class=" bg-slate-500 w-80 text-center h-9 flex flex-col gap-5 justify-center "> <p><i class="fa-solid fa-bell"></i> notifecation </p></div> 

            <div class=" bg-slate-500 bg-opacity-30 w-80 text-center flex flex-col justify-around h-64  ">
               
                <h3><i class="fa-regular fa-user"> </i>clients</h3>
                <h3><i class="fa-solid fa-chart-line"></i> Activities</h3>
                <h3><i class="fa-solid fa-book"></i> Reservations</h3>

        </div>
            
            </div>
                
        </aside>
        <main class="w-full">
            
            <div>
            <div class="w-full flex justify-between items-center mb-3 mt-1 pl-3">
    <div class="ml-3">
      <div class="w-full max-w-sm min-w-full relative">
        <div class="relative">
          
           
        </div>
      </div>
    </div>
  </div>
  <?php
     

      $activi ="SELECT * FROM activities";
       $act = mysqli_query($db ,$activi);
      
      
    
        ?>
  <div class=" some relative flex flex-col w-full h-[80vh] overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
    <table class="w-full text-left table-auto min-w-max">
      <thead>
        <tr>
          <th class="p-4 border-b border-slate-300 bg-slate-50">
            <p class="block text-sm  leading-none  text-black font-bold">
            title
            </p>
          </th>
          <th class="p-4 border-b border-slate-300 bg-slate-50">
            <p class="block text-sm  leading-none  text-black font-bold">
            description
            </p>
          </th>
          <th class="p-4 border-b border-slate-300 bg-slate-50">
            <p class="block text-sm  leading-none  text-black font-bold">
            destination
            </p>
          </th>
          <th class="p-4 border-b border-slate-300 bg-slate-50">
            <p class="block text-sm  leading-none  text-black font-bold">
            price
            </p>
          </th>
          <th class="p-4 border-b border-slate-300 bg-slate-50">
            <p class="block text-sm  leading-none  text-black font-bold">
            start_date
            </p>
          </th>
          <th class="p-4 border-b border-slate-300 bg-slate-50">
            <p class="block text-sm  leading-none  text-black font-bold">
            final_date
            </p>
          </th>
          <th class="p-4 border-b border-slate-300 bg-slate-50">
            <p class="block text-sm  leading-none  text-black font-bold">
            places
            </p>
          </th>
        
        </tr>
      </thead>
      <?php
        while($row= mysqli_fetch_assoc($act)){

        
        ?>
      <tbody>
       
      
          <td class="p-4 py-5">
            <p class="block font-semibold text-sm text-slate-800">  <?php   echo $row["title"]?></p>
          </td>
          <td class="p-4 py-5">
            <p class="block text-sm text-slate-800">    <?php echo $row["description"]?></p>
          </td>
          <td class="p-4 py-5">
            <p class="block text-sm text-slate-800">   <?php echo $row["destination"]?></p>
          </td>
          <td class="p-4 py-5">
            <p class="block text-sm text-slate-800"> <?php echo $row["price"]?></p>
          </td>
          <td class="p-4 py-5">
            <p class="block text-sm text-slate-800">     <?php echo $row["start_date"]?></p>
          </td>
          <td class="p-4 py-5">
            <p class="block text-sm text-slate-800">      <?php echo $row["final_date"]?></p>
          </td>
          <td class="p-4 py-5">
            <p class="block text-sm text-slate-800">      <?php echo $row["places"]?></p>
          </td>
 
         



          <td class="p-4 py-5">
              <div class="block text-center">
                  <button class="text-slate-600 hover:text-slate-800">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                          <path d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                          <path fill-rule="evenodd" d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087ZM12 10.5a.75.75 0 0 1 .75.75v4.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-3 3a.75.75 0 0 1-1.06 0l-3-3a.75.75 0 1 1 1.06-1.06l1.72 1.72v-4.94a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                      </svg>
                  </button>
                  <button class="text-slate-600 hover:text-slate-800">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                          <path d="M7.5 3.375c0-1.036.84-1.875 1.875-1.875h.375a3.75 3.75 0 0 1 3.75 3.75v1.875C13.5 8.161 14.34 9 15.375 9h1.875A3.75 3.75 0 0 1 21 12.75v3.375C21 17.16 20.16 18 19.125 18h-9.75A1.875 1.875 0 0 1 7.5 16.125V3.375Z" />
                          <path d="M15 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 17.25 7.5h-1.875A.375.375 0 0 1 15 7.125V5.25ZM4.875 6H6v10.125A3.375 3.375 0 0 0 9.375 19.5H16.5v1.125c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V7.875C3 6.839 3.84 6 4.875 6Z" />
                      </svg>
                  </button>

              </div>
              <?php
        }
?>
          </td>
        </tr>
        
      </tbody>
    </table>
  </div>
            </div>
        </main>


  
    </section>
      
  
</body>

</html>