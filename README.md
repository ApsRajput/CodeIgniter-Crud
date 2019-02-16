# CodeIgniter-CRUD-Model

Be aware this is not meant to be an ORM library. It is a simple base model which your models can extend to give them supercharged features. This model doesn't require you to change how you would natively interact with CodeIgniter's database or Active Record class very much. It's not designed to help writing your database interactions more efficient, not to interfere.

## Installation

Save MY_Model.php as application/core/Faqs_model.php

## Creating a Model

To demonstrate how to use this base model, we'll work with an imaginary database table called "posts" which has 3 fields

This is all it takes to perform basic CRUD actions against this model.

## Basic CRUD

Selecting Records
<?php

// Load the model
$this->load->model('mdl_posts');

// Get all the posts
$posts = $this->mdl_posts->get()->result();

// Get a post by ID
$posts = $this->mdl_posts->get_by_id(3);

// Get posts meeting criteria:
$posts = $this->mdl_posts->where('user_id', 5)->get()->result();
?>


### Inserting Records

If your form fields are named exactly as the database fields are, inserting new records into the database is as simple as using the save function inside a controller after the form has been submitted:

$this->mdl_posts->save();
The base model automatically creates the array of data for you based on what is posted from the form.

### Updating Records

Updating existing records is exactly the same as inserting records, except the save function needs the id of the record to update:

$this->mdl_posts->save(12);
### Deleting Records

The base model's delete function accepts the record's id for deletion:

$this->mdl_posts->delete(5);
## Form Validation

Add validation to our model by creating a function called validation_rules and using it to return an array of CodeIgniter validation rules:

Your application may require that a single model be able to validate against different sets of rules based on the action. For example, maybe editing a post should have different validation rules than creating a new post. In that case, create another validation function in your model, call it whatever you want, and specify the name of the function in the run_validation() call in your controller:

This example would use the validation rule array returned from the function called validation_rules_edit in your post model.

## Form Pre-Population

Pre-populating the form based in an existing database record is simple:

Note that we only want the prep_form() function to be called under the condition that the form has not yet been submitted. In the form view, set the values in your form fields using the model's form_value() function:

<input type="text" name="post_title" value="<?php echo $this->mdl_posts->form_value('post_title'); ?>">

<textarea name="post_content"><?php echo $this->mdl_posts->form_value('post_content'); ?></textarea>
The form_value() function will pre-populate your form when editing an existing record and will also retain your previously submitted values in case the form doesn't validate upon submission.

## Additional Features

### Modifying Data Pre-Insert/Update

The base model contains a db_array() function which creates an array to submit to your database based on posted values from a form. Oftentimes, we need to do things to that data before it actually gets to the database.
ee
## Finish

I hope you find this guide and the base model useful. It's been crazy useful for me, and I wouldn't dare consider starting any CodeIgniter project without it. Happy coding!

