THE DEVELOPMENT OF WAPS (WEB-BASED AUTOMATED PERT-CPM SCHEDULER WITH SIMULATION)

This web application allow users to create a schedule for their project with different methods. The algorithms used are divided into 2: Without Simulation and With Simulation. The following are the different algorithms used:

WITHOUT SIMULATION
1) PERT with Computation for Completion Probability
2) CPM 

WITH SIMULATION (Using Monte Carlo Simulation)
1) Normal Distribution
2) Triangular Distribution
3) BETA-PERT Distribution

====================================================================================

This web application was created with: 
- Apache and MySQL
- CodeIgniter 3
- PHP 7.4
- Python 3.10
- HTML and CSS
- Ajax

====================================================================================

Pre-requisites:
- Composer must be installed.
- SciPy must be installed.

====================================================================================

How to use WAPS:
1) Pick an algorithm
2) Enter how many activities your project has and what Unit of Time you prefer. Then, click Generate Table.
3) Enter the Description, Durations, and Pre-requisites (write - if none) of your activities. Then, click Calculate.
