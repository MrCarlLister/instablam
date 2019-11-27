
## What is this?
I've built this as an exercise in learning some fundemental basics for laravel. Something I can refer to and build out. Feel freel to fork.

## Notes about project

- Using v6 requires `composer require laravel/ui` for authentication setup -> [see this](https://stackoverflow.com/a/34546836/1826992)
- Uses vue and bootstrap
- User table holding registration details
- Profile table holding profile information (description, title, url)
- Relationship between Profile and User
- External library intervention/image (image handling)
- User able to add posts to own profile
- User able to edit own profile
- Policies used to hide aspects of UI (can't follow if not logged in)
- Newsfeed of followers post, in date order.
- Caching of data (includes laravel telescope for application monitoring)
- Includes functions for sending email to new registers (using smtp.mailtrap.io for email simulation)


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
