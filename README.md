
# Containerizing a Symfony Website

## Prerequisites
- **Docker**: A container engine that allows you to create, deploy, and manage applications within containers.
- **Docker Compose**: A tool that enables you to define and manage multi-container environments.

### Installing Docker
#### For Linux:
1. Update your system:
   ```bash
   sudo apt-get update
   ```

2. Install required packages:
   ```bash
   sudo apt-get install apt-transport-https ca-certificates curl software-properties-common
   ```

3. Add Docker's GPG key:
   ```bash
   curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
   ```

4. Add the Docker repository:
   ```bash
   sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
   ```

5. Install Docker:
   ```bash
   sudo apt-get update
   sudo apt-get install docker-ce
   ```

6. Verify Docker installation:
   ```bash
   docker --version
   ```

#### For macOS:
1. Download **Docker Desktop** from the [official website](https://www.docker.com/products/docker-desktop).
2. Install Docker Desktop by following the instructions.
3. Once installed, verify the installation by opening a terminal and running:
   ```bash
   docker --version
   ```

#### For Windows:
1. Download **Docker Desktop** from the [official website](https://www.docker.com/products/docker-desktop).
2. Install Docker Desktop by following the provided instructions.
3. Verify the installation by opening PowerShell and running:
   ```bash
   docker --version
   ```

### Installing Docker Compose
#### For Linux:
1. Download the latest version of Docker Compose:
   ```bash
   sudo curl -L "https://github.com/docker/compose/releases/download/$(curl -s https://api.github.com/repos/docker/compose/releases/latest | grep -Po '"tag_name": "\K.*\d')" /usr/local/bin/docker-compose
   ```

2. Apply execution permissions:
   ```bash
   sudo chmod +x /usr/local/bin/docker-compose
   ```

3. Verify the installation:
   ```bash
   docker-compose --version
   ```

#### For macOS and Windows:
Docker Compose is already included in Docker Desktop, so no additional installation is needed.

---

## Installation

1. Clone this repository:
   ```bash
   git clone https://github.com/adjimi-lionelle/lamineur-music-academic.git
   cd lamineur-music-academic
   ```

2. Build and start the containers:
   ```bash
   docker-compose up -d --build
   ```

3. Access the application via `http://localhost:8080`.
