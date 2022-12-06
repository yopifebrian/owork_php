<?php
require_once '../partials/title-meta.php';
?>
<head>
  <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
    <nav class="container">
        <div class="hover-underline-animation">Home</div>
        <div class="hover-underline-animation">About</div>
        <div class="hover-underline-animation">Jobs</div>
        <div class="hover-underline-animation">Profile</div>
      </nav>
      
      <div class="content-container">
        <div class="content-title">Applied Jobs</div>
          <div>
            <input type="text" placeholder="Search Job" name="search">
            <input type="text" placeholder="Location" name="search">
          </div>
        <div class="sort">
          <div class="Sort-by">
            <form action="/action_page.php">
        <label for="cars">Sort By:</label>
        <select >
          <option value="" selected disabled hidden></option>
          <option value="category">Category</option>
          <option value="date">Date</option>
          <option value="location">Location</option>
        </select>
      </form>
          </div>
          <div class="Sort"><label for="type">Type:</label>
        <select >
          <option value="" selected disabled hidden></option>
          <option value="full-time">Full-time</option>
          <option value="part-time">Part-time</option>
          <option value="freelance">Freelance</option>
        </select>
          
        </div>
          <div>
          <input type="submit" value="Submit">
          </div>
        </div> 
        <table id="jobtable">
        <tr>
          <th>Company</th>
          <th>Job</th>
          <th>Location</th>
          <th>Type</th>
        </tr>
        <tr>
          <td>Facebook</td>
          <td>Cloud Architect</td>
          <td>Indonesia, Jakarta</td>
          <td>Full-time</td>
        </tr>
       <tr>
          <td>Facebook</td>
          <td>Cloud Architect</td>
          <td>Indonesia, Jakarta</td>
          <td>Full-time</td>
        </tr>
          <tr>
          <td>Facebook</td>
          <td>Cloud Architect</td>
          <td>Indonesia, Jakarta</td>
          <td>Full-time</td>
        </tr>
          <tr>
          <td>Facebook</td>
          <td>Cloud Architect</td>
          <td>Indonesia, Jakarta</td>
          <td>Full-time</td>
        </tr>
          <tr>
          <td>Facebook</td>
          <td>Cloud Architect</td>
          <td>Indonesia, Jakarta</td>
          <td>Full-time</td>
        </tr>
          <tr>
          <td>Facebook</td>
          <td>Cloud Architect</td>
          <td>Indonesia, Jakarta</td>
          <td>Full-time</td>
        </tr>
          <tr>
          <td>Facebook</td>
          <td>Cloud Architect</td>
          <td>Indonesia, Jakarta</td>
          <td>Full-time</td>
        </tr>
          <tr>
          <td>Facebook</td>
          <td>Cloud Architect</td>
          <td>Indonesia, Jakarta</td>
          <td>Full-time</td>
        </tr>
      </table>
        </div>
      </div>
    
</body>
</html>