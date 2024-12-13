<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="main.js"></script>

    <script src="tailwind.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <style>
        .some {
            -ms-overflow-style: none; /* IE and Edge */
            scrollbar-width: none;   /* Firefox */
        }
    </style>
</head>
<body class=" h-screen overflow-hidden">
    <?php

    include("database.php");
    include("add.php");
    

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
    <section class="flex">
        <aside class=" bg-opacity-70 bg-black w-96 h-[100vh]" >
            <div class="flex flex-col items-center  mt-4 gap-2"> 
              <div class=" bg-slate-500 w-80 text-center h-9 flex flex-col gap-5 justify-center "><p> <i class="fa-solid fa-bars"></i> Menu </p></div> 
            
            <div class=" bg-slate-500 bg-opacity-30 w-80 text-center flex flex-col justify-around h-64 ">
            <button onclick="showformeaclient()" >add client </button >
                <button > add activity</button >
                <button >add reservation</button >
            </div>

            <div class=" bg-slate-500 w-80 text-center h-9 flex flex-col gap-5 justify-center "> <p><i class="fa-solid fa-bell"></i> notifecation </p></div> 

            <div class=" bg-slate-500 bg-opacity-30 w-80 text-center flex flex-col justify-around h-64  ">
            <h3 class=" cursor-pointer"><a href="dashboord.php"></a>Clients</h3>
                <h3 class=" cursor-pointer"><i class="fa-solid fa-chart-line"><a href="activity.php"></a></i> Activities</h3>
                <h3 class=" cursor-pointer"><i class="fa-solid fa-book"> <a href="reservation.php">Reservations</a> </i> Reservations</h3>

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
        $sqlstat = 'SELECT * FROM client'; 
        $myql = mysqli_query($db,$sqlstat);
        ?>
  <div class=" some relative flex flex-col w-full h-[80vh] overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
    <table class="w-full text-left table-auto min-w-max">
      <thead>
        <tr>
          <th class="p-4 border-b border-slate-300 bg-slate-50">
            <p class="block text-sm  text-black font-bold leading-none ">
            name 
            </p>
          </th>
          <th class="p-4 border-b border-slate-300 bg-slate-50">
            <p class="block text-sm  text-black font-bold leading-none ">
           last name
            </p>
          </th>
          <th class="p-4 border-b border-slate-300 bg-slate-50">
            <p class="block text-sm  text-black font-bold leading-none ">
              Email
            </p>
          </th>
          <th class="p-4 border-b border-slate-300 bg-slate-50">
            <p class="block text-sm  text-black font-bold leading-none ">
          Phone
            </p>
          </th>
          <th class="p-4 border-b border-slate-300 bg-slate-50">
            <p class="block text-sm font-normal leading-none ">
              Adresse
            </p>
          </th>
          <th class="p-4 border-b border-slate-300 bg-slate-50">
            <p class="block text-sm  text-black font-bold leading-none ">
              Date of Birth
            </p>
          </th>
        
        </tr>
      </thead>
      <?php
        while($row= mysqli_fetch_assoc($myql)){

        
        ?>
      <tbody>
       
      
          <td class="p-4 py-5">
            <p class="block font-semibold text-sm text-slate-800"> <?php   echo $row["name"]?></p>
          </td>
          <td class="p-4 py-5">
            <p class="block text-sm text-slate-800">  <?php echo $row["last_name"]?></p>
          </td>
          <td class="p-4 py-5">
            <p class="block text-sm text-slate-800"> <?php echo $row["email"]?></p>
          </td>
          <td class="p-4 py-5">
            <p class="block text-sm text-slate-800"> <?php echo $row["phone"]?></p>
          </td>
          <td class="p-4 py-5">
            <p class="block text-sm text-slate-800">    <?php echo $row["adresse"]?></p>
          </td>
          <td class="p-4 py-5">
            <p class="block text-sm text-slate-800">    <?php echo $row["date_of_birth"]?></p>
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
    <div class="  max-w-md mx-auto mt-10 bg-white shadow-lg rounded-lg overflow-hidden relative bottom-[110vh] hidden  " id="Mclient">
    <div class="text-2xl py-4 px-6 bg-gray-900 text-white text-center font-bold uppercase">
        Add a client
    </div>
    <form class="py-4 px-6" action="" method="POST">
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="name">
                Name
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="name" type="text" placeholder="Enter your name" name="name">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="name">
               Last Name
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="name" type="text" placeholder="Enter your name"  name="last_name">
        </div>
      
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="email">
                Email
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="email" type="email" placeholder="Enter your email" name="email">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="phone">
                Phone Number
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="phone" type="tel" placeholder="Enter your phone number" name="phone">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="">
                adresse
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="text" type="text" placeholder="Enter your adresse" name="adresse">
        </div>


        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="date">
                Date of Birth
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="date" type="date" placeholder="Select a date" name="date_of_birth">
        </div>
       
      
       
        <div class="flex items-center justify-around mb-4">
            <button
                class="bg-gray-900 text-white py-2 px-4 rounded hover:bg-gray-800 focus:outline-none focus:shadow-outline"
                type="submit" name="Submit">
                Add a client
            </button>
            <button
                class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-800 focus:outline-none focus:shadow-outline"
               onclick="showformeaclient()">
               Close
            </button>
        </div>

    </form>
</div>


</body>
</html>