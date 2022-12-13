# Back-End Development Management Application For the Worcester Art Museum
+ By: Scout Perry
+ URL: <http://bead.scoutperry.com>

## Feature summary
+ Users can add/update projects
+ Users can add/update their evaulations of their peers projects
  
## Database summary
+ My application has 4 tables in total (`projects`, `ratings`, `project_rating`, `departments`, `users`)
+ There’s a one-to-many relationship between `departments` and `ratings`
+ There’s a one-to-many relationship between `departments` and `projects`
+ There’s a many-to-many relationship between `projects` and `ratings`

## Outside resources
+ https://www.w3schools.com/
+ https://developer.mozilla.org/en-US/docs/Web