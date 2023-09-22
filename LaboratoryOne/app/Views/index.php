<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>List of Students</title>
</head>
<body>

<form action="/save" method="post">
    <input type="hidden" name="id" value="<?=$studentInfoEdit['id']??''?>">
    <div class="container mt-5">
        <h1>List of Students</h1>
        <hr>

        <div class="insert-form-container">
            <div class="row">
                <div class="mb-3 row">
                    <label for="studID" class="col-sm-2 col-form-label">Student ID</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control-plaintext" id="studID" placeholder="Enter Student ID" name="studentID" value="<?=$studentInfoEdit['StudID']??''?>">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="studName" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-4">
                            <input type="text"  class="form-control-plaintext" id="studName" placeholder="Enter Full Name" name="studentName" value="<?=$studentInfoEdit['StudName']??''?>">
                        </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" class="form-control" name="studentGender" required>
                            <option value="" <?= empty($studentInfoEdit['StudGender']) ? 'selected' : '' ?>>Choose Gender
                            </option>
                            <?php foreach ($genders as $gender): ?>
                                <option value="<?= $gender ?>" <?= ($gender == ($studentInfoEdit['StudGender'] ??'')) ? 'selected' : '' ?>>
                                    <?= $gender ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="form-group">
                        <label for="stuCourse" class="col-sm-2 col-form-label">Course</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="studCourse" placeholder="Enter Your Course" name="studentCourse" value="<?=$studentInfoEdit['StudCourse']??''?>">
                        </div>
                    </div>
                </div>
  
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="section">Section</label>
                        <select id="section" class="form-control" name="studentSection" required>
                            <option value="" <?= empty($studentInfoEdit['StudSection']) ? 'selected' : '' ?>>Choose Section
                            </option>
                            <?php foreach ($sections as $section): ?>
                                <option value="<?= $section['Section'] ?>" <?= ($section['Section'] == ($studentInfoEdit['StudSection'] ??'')) ? 'selected' : '' ?>>
                                    <?= $section['Section'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>



                <div class="mb-3 row">
                    <div class="form-group">
                    <label for="stuYear" class="col-sm-2 col-form-label">Year Level</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="studentYear" required>
                                <option value="" <?= empty($studentInfoEdit['StudYear']) ? 'selected' : '' ?>>Choose Year Level
                                </option>
                                <?php foreach ($yearlevel as $level): ?>
                                    <option value="<?= $level ?>" <?= ($level == ($studentInfoEdit['StudYear'] ?? '')) ?'selected' : '' ?>>
                                        <?= $level ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-2">
                    <button class="btn btn-primary" type="submit">Save</button>
                <div>

                </div>
    </div>
</form>

    
    <div class="display-container">
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        <th scope="col">Student ID</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Student Gender</th>
                        <th scope="col">Student Course</th>
                        <th scope="col">Student Section</th>
                        <th scope="col">Student Year</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $student):?>
                    <tr>
                        <td><?=$student['StudID']?></td>
                        <td><?=$student['StudName']?></td>
                        <td><?=$student['StudGender']?></td>
                        <td><?=$student['StudCourse']?></td>
                        <td><?=$student['StudSection']?></td>
                        <td><?=$student['StudYear']?></td>
                        <td>
                            <a href="/edit/<?=$student['id']?>" type="button" class="btn btn-sm btn-secondary">Edit</a>
                            <a href="/delete/<?=$student['id']?>" type="button" class="btn btn-sm btn-danger">Delete</a>
                        </td>                             
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
