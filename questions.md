- How long did you spend on the coding test?
    - I spent around 5 hours in total to finish the coding, the main reasons are:
        - I tried to demonstrate my devOps skills setting up docker-compose file, this application can be deployed using
          a docker within a minute.
        - I tried to apply coding best practice when I code as much as I can. I see this is an important thing to
          consider more than code it fast!
- What would you add to your solution if you had more time? If you didn't spend much time on the coding test then use
  this as an opportunity to explain what you would add.
    - there is going to be few bugs on search feature, I will need to query comparing lowercase both search text and
      database using whereRaw()
- What was the most useful feature that was added to the latest version of your chosen language? Please include a
  snippet of code that shows how you've used it.
    - I like to transform data before sending to FE, this way we can limit what information the users can see. fractal(
      $properties, new PropertyTransformer())->toArray();

- How would you track down a performance issue in production? Have you ever had to do this?
    - Yes I have experienced in monitoring projects. I will use a logging package called Bugsnag to monitor bugs that
      may cause in the future.
