import os
import subprocess

def init():
    # Change the current working directory
    os.chdir('../../../../../')

    # Start the artisan tinker command
    process = subprocess.Popen(['/opt/homebrew/bin/restic', '-r', 'dev_backup', '--verbose', '--verbose', 'backup', 'development/laravel/not_work/pmx-backup'], stdin=subprocess.PIPE, stdout=subprocess.PIPE, stderr=subprocess.PIPE, text=True)

    # Wait for the tinker prompt
    process.stdin.write("99x9")
    process.stdin.flush()

    # Capture the output after running the command
    output, error = process.communicate()

    # Print the output
    print("opt", output)

    # Optionally, check for errors
    if error:
        print("Error:", error)

init()