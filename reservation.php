<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="tailwind.js"></script>
    <script src="main.js"></script>
    <title>Document</title>
    <style>
        .some {
            -ms-overflow-style: none; /* IE and Edge */
            scrollbar-width: none;   /* Firefox */
        }
    </style>
   
</head>

<body class=" overflow-hidden ">
    <?php 
    include("database.php");

   
    if (isset($_POST ["submit"])){
      
        $clients=$_POST["clients"];
        $activities =$_POST["activities"];
        $date=$_POST ["reservation"];
        $status=$_POST["status"];
         $kk="INSERT INTO reservations (ID_CLIENT, ID_ACTIVITIES,DATE_RESERVATION,STATUT) VALUES ('$clients','$activities','$date','$status')";
         if (mysqli_query($db ,$kk)){
            // echo"hadik";
         }else {
            // echo "mkayna m3na";
         }
    }
   
        ?>
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
   
      <section class="flex max-h-screen">
        <aside class=" bg-opacity-70 bg-black w-96 h-screen" >
            <div class="flex flex-col items-center gap-2"> 
              <div class=" bg-slate-500 w-80 text-center h-9 flex flex-col gap-5 justify-center "><p> <i class="fa-solid fa-bars"></i> Menu </p></div> 
            
            <div class=" bg-slate-500 bg-opacity-30 w-80 text-center flex flex-col justify-around h-64 ">
            <button  > Add  Clients</button >
            <button onclick="showformreserve ()" > Add  Activities</button >
                <button onclick="showformreserve ()" > Add  Reservation</button >
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
            <div class="w-full flex justify-between items-center  pl-3">
    <div class="ml-3">
      <div class="w-full max-w-sm min-w-full relative">
        <div class="relative">
          
           
        </div>
      </div>
    </div>
  </div>
  <?php
       $rsrv="SELECT reservations.ID,
       client.name,
       client.last_name,
        activities.title,
        reservations.DATE_RESERVATION,
        reservations.STATUT
        FROM 
        reservations 
        INNER JOIN 
        client ON  reservations.ID_CLIENT =client.id
       INNER JOIN 
       activities ON reservations.ID_ACTIVITIES=activities.id ";

$result = mysqli_query($db ,$rsrv);
?>
        
  <div class=" some relative flex flex-col w-full h-[80vh] overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
    <table class="w-full text-left table-auto min-w-max">
      <thead>
        <tr>
          <th class="p-4 border-b border-slate-300 bg-slate-50">
            <p class="block text-sm  leading-none text-black font-bold">
            Name  Last name
            </p>
          </th>
          <th class="p-4 border-b border-slate-300 bg-slate-50">
            <p class="block text-sm  leading-none text-black font-bold">
           Title
            </p>
          </th>
          <th class="p-4 border-b border-slate-300 bg-slate-50">
            <p class="block text-sm  leading-none text-black font-bold">
            Date of the reservation
            </p>
          </th>
          <th class="p-4 border-b border-slate-300 bg-slate-50">
            <p class="block text-sm  leading-none text-black font-bold">
            Status
            </p>
          </th>

        </tr>
      </thead>
      <?php
        while($row= mysqli_fetch_assoc($result)){

        
        ?>
      <tbody>
       
      
          <td class="p-4 py-5">
            <p class="block font-semibold text-sm text-slate-800">  <?php   echo $row["name"]. " ".$row["last_name"] ?></p>
          </td>
          <td class="p-4 py-5">
            <p class="block text-sm text-slate-800"><?php echo $row["title"]?></p>
          </td>
          <td class="p-4 py-5">
            <p class="block text-sm text-slate-800">    <?php echo $row["DATE_RESERVATION"]?></p>
          </td>
          <td class="p-4 py-5">
            <p class="block text-sm text-slate-800">   <?php echo $row["STATUT"]?></p>
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
    <div class="max-w-md mx-auto mt-10 bg-white shadow-lg rounded-lg overflow-hidden  hidden relative bottom-[100vh]" id="reserve">
    <div class="text-2xl py-4 px-6 bg-gray-900 text-white text-center font-bold uppercase">
        Add a Reservation
    </div>
    <form class="py-4 px-6" action="" method="POST">
        <div class="mb-4">
        <?php 
$cln= "SELECT id, name, last_name FROM client";
$sql = mysqli_query($db, $cln);
?>
        <label for="clients" class="block mb-2 text-sm font-medium  dark:text-white">Select a Client</label>
        <select id="clients" name="clients" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected disabled>Choose a client</option>
            <?php
          
            while ($row = mysqli_fetch_assoc($sql)) {
                echo "<option value='{$row['id']}'>{$row['name']} {$row['last_name']}</option>";
            }
            ?>
        </select>
        </div>
        <div class="mb-4">
        <?php 

$reserv = "SELECT id,title FROM activities";
$sqql =mysqli_query($db ,$reserv);


?>

<label for="clients" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an activity</label>
        <select id="clients" name="activities" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected disabled>Choose activity</option>
           
          <?php
           while ($row = mysqli_fetch_assoc($sqql)) {
               echo "<option value='{$row['id']}'>{$row['title']}</option>";
           }
           ?> 
        </select>
        </div>
        <div class="mb-4">
              <select name="status" id="status">
         <option selected disabled>Choose status</option>
        <option value="waiting">waiting</option>
        <option value="confirmed">confirmed</option>
        <option value="canceled">canceled</option>

    </select>
        </div>
      
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="reserve">
               Date of the reservation
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="date" placeholder="Select a date" name="reservation" id="reserve" >
        </div>
       
      
       
        <div class="flex items-center justify-around mb-4">
            <button
                class="bg-gray-900 text-white py-2 px-4 rounded hover:bg-gray-800 focus:outline-none focus:shadow-outline"
                type="submit" name="submit">
                Add Reservation
            </button>
            <button
                class="bg-red-700 text-white py-2 px-4 rounded hover:bg-gray-800 focus:outline-none focus:shadow-outline" onclick="showformreserve ()">
              close
            </button>
        </div>

    </form>
</div>
</body>
</html>
